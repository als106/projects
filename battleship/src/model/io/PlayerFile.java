package model.io;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;

import org.junit.runner.FilterFactory.FilterNotCreatedException;

import model.Board;
import model.CellStatus;
import model.Coordinate;
import model.CoordinateFactory;
import model.Craft;
import model.CraftFactory;
import model.Orientation;
import model.exceptions.CoordinateAlreadyHitException;
import model.exceptions.InvalidCoordinateException;
import model.exceptions.NextToAnotherCraftException;
import model.exceptions.OccupiedCoordinateException;
import model.exceptions.io.BattleshipIOException;

public class PlayerFile implements IPlayer {
	
	private BufferedReader br;
	private String name;
	private CellStatus lastShotStatus;
	
	public PlayerFile(String name, BufferedReader reader){
		this.name = name;
		if(reader == null) {
			throw new NullPointerException();
		}
		br = reader;
	}
	@Override
	public String getName() {
		return name + " (PlayerFile)";
	}

	@Override
	public void putCrafts(Board b) throws InvalidCoordinateException, OccupiedCoordinateException, NextToAnotherCraftException, BattleshipIOException {
		if(b != null) {
			String cadena;
			String lectura[];
			try {
				while((cadena = br.readLine())!=null) {
					lectura = cadena.split("\\s+");
					if(lectura[0].equals("put")) {
						if(lectura.length >= 5 && lectura.length <=6) {
							if(lectura[2].equals("NORTH") || lectura[2].equals("EAST") ||lectura[2].equals("SOUTH") || lectura[2].equals("WEST")) {
								if(Orientation.valueOf(lectura[2]) != null) {
									Craft barco = CraftFactory.createCraft(lectura[1],Orientation.valueOf(lectura[2]));
									if(barco != null) {
										if(lectura.length == 5) {
											Coordinate coordenadas = CoordinateFactory.createCoordinate(Integer.parseInt (lectura[3]),Integer.parseInt (lectura[4]));
											b.addCraft(barco,coordenadas);
										}
										else if(lectura.length == 6) {
											Coordinate coordenadas = CoordinateFactory.createCoordinate(Integer.parseInt (lectura[3]),Integer.parseInt (lectura[4]),Integer.parseInt (lectura[5]));
											b.addCraft(barco,coordenadas);
										}
									}
								}else {throw new BattleshipIOException("Orientacion no valida");}
							}else {throw new BattleshipIOException("Orientacion no valida");}
						}
						else {
							throw new BattleshipIOException("Los parametros no son correctos");
						}
					}
					else if(lectura[0].equals("endput") || lectura[0].equals("exit")) {
						return;
					}
					else {
						throw new BattleshipIOException("comando diferente de put, endput o exit.");
					}
				}
			} catch (NumberFormatException e) {
				throw new BattleshipIOException("Coordenadas no numericas");
			} catch (IOException e) {
				throw new BattleshipIOException("La linea no se ha podido leer");
			}
		}
		else {
			throw new NullPointerException();
		}
	}

	@Override
	public Coordinate nextShoot(Board b) throws BattleshipIOException, CoordinateAlreadyHitException, InvalidCoordinateException {
		if(b != null) {
			String cadena;
			String lectura[];
			try {
				if((cadena = br.readLine())!=null) {
					lectura = cadena.split("\\s+");
					if(lectura[0].equals("shoot") || lectura[0].equals("exit")) {
						if(lectura[0].equals("shoot")) {
							if(lectura.length > 2) {
								if(lectura.length == 3) {
									try {
										lastShotStatus = b.hit(CoordinateFactory.createCoordinate(Integer.parseInt(lectura[1]),Integer.parseInt(lectura[2])));
										return CoordinateFactory.createCoordinate(Integer.parseInt(lectura[1]),Integer.parseInt(lectura[2]));
									} catch (NumberFormatException e) {
										lastShotStatus = null;
										throw new BattleshipIOException("Coordenadas no numericas");
									}
								}
								else if(lectura.length == 4){
									try {
										lastShotStatus = b.hit(CoordinateFactory.createCoordinate(Integer.parseInt(lectura[1]),Integer.parseInt(lectura[2]),Integer.parseInt(lectura[3])));
										return CoordinateFactory.createCoordinate(Integer.parseInt(lectura[1]),Integer.parseInt(lectura[2]),Integer.parseInt(lectura[3]));
									} catch (NumberFormatException e) {
										lastShotStatus = null;
										throw new BattleshipIOException("Coordenadas no numericas");
									}
								}
								else {
									lastShotStatus = null;
									throw new BattleshipIOException("Los parametros no son correctos");
								}
							}
							else {
								lastShotStatus = null;
								throw new BattleshipIOException("Los parametros no son correctos");
							}
						}
						else {
							lastShotStatus = null;
							return null;
							}
					}
					else {
						lastShotStatus = null;
						throw new BattleshipIOException("comando diferente de shoot o exit.");
					}
				}
				else {
					lastShotStatus = null;
					return null;
				}
			}
				catch (IOException e) {
				lastShotStatus = null;
				throw new BattleshipIOException("La linea no se ha podido leer");
			}
		}
		else {
			lastShotStatus = null;
			throw new NullPointerException();
		}
	}
	@Override
	public CellStatus getLastShotStatus() {
		return lastShotStatus;
	}


}
