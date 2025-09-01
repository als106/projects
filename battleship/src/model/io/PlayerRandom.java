package model.io;

import java.util.Random;

import model.Board;
import model.CellStatus;
import model.Coordinate;
import model.CoordinateFactory;
import model.Craft;
import model.CraftFactory;
import model.Orientation;
import model.aircraft.Board3D;
import model.exceptions.CoordinateAlreadyHitException;
import model.exceptions.InvalidCoordinateException;
import model.exceptions.NextToAnotherCraftException;
import model.exceptions.OccupiedCoordinateException;
import model.ship.Board2D;

public class PlayerRandom implements IPlayer {
	private Random random;
	private String name;
	private CellStatus lastShotStatus;
	public PlayerRandom(String name,long seed) {
		this.name = name;
		random = new Random(seed);
	}
	@Override
	public String getName() {
		return name + " (PlayerRandom)";
	}

	@Override
	public void putCrafts(Board b) {
		Craft barco1 = CraftFactory.createCraft("ship.Battleship", Orientation.values()[random.nextInt(4)]);
		int contador = 0;
		boolean introducido = false;
		while(contador != 100 && introducido == false) {
			try {
				Coordinate c = genRandomCoordinate(b, Craft.BOUNDING_SQUARE_SIZE);
				b.addCraft(barco1, c);
				introducido = true;
			} catch (InvalidCoordinateException | OccupiedCoordinateException | NextToAnotherCraftException e) {}
			contador++;
		}
		Craft barco2 = CraftFactory.createCraft("ship.Carrier", Orientation.values()[random.nextInt(4)]);
		contador = 0;
		introducido = false;
		while(contador != 100 && introducido == false) {
			try {
				Coordinate c = genRandomCoordinate(b, Craft.BOUNDING_SQUARE_SIZE);
				b.addCraft(barco2, c);
				introducido = true;
			} catch (InvalidCoordinateException | OccupiedCoordinateException | NextToAnotherCraftException e) {}
			contador++;
		}
		Craft barco3 = CraftFactory.createCraft("ship.Cruiser", Orientation.values()[random.nextInt(4)]);
		contador = 0;
		introducido = false;
		while(contador != 100 && introducido == false) {
			try {
				Coordinate c = genRandomCoordinate(b, Craft.BOUNDING_SQUARE_SIZE);
				b.addCraft(barco3, c);
				introducido = true;
			} catch (InvalidCoordinateException | OccupiedCoordinateException | NextToAnotherCraftException e) {}
			contador++;
		}
		Craft barco4 = CraftFactory.createCraft("ship.Destroyer", Orientation.values()[random.nextInt(4)]);
		contador = 0;
		introducido = false;
		while(contador != 100 && introducido == false) {
			try {
				Coordinate c = genRandomCoordinate(b, Craft.BOUNDING_SQUARE_SIZE);
				b.addCraft(barco4, c);
				introducido = true;
			} catch (InvalidCoordinateException | OccupiedCoordinateException | NextToAnotherCraftException e) {}
			contador++;
		}
		if(b instanceof Board3D) {
			Craft avion1 = CraftFactory.createCraft("aircraft.Bomber", Orientation.values()[random.nextInt(4)]);
			contador = 0;
			introducido = false;
			while(contador != 100 && introducido == false) {
				try {
					Coordinate c = genRandomCoordinate(b, Craft.BOUNDING_SQUARE_SIZE);
					b.addCraft(avion1, c);
					introducido = true;
				} catch (OccupiedCoordinateException | NextToAnotherCraftException | InvalidCoordinateException e) {}
				contador++;
			}
			Craft avion2 = CraftFactory.createCraft("aircraft.Fighter", Orientation.values()[random.nextInt(4)]);
			contador = 0;
			introducido = false;
			while(contador != 100 && introducido == false) {
				try {
					Coordinate c = genRandomCoordinate(b, Craft.BOUNDING_SQUARE_SIZE);
					b.addCraft(avion2, c);
					introducido = true;
				} catch (OccupiedCoordinateException | NextToAnotherCraftException | InvalidCoordinateException e) {}
				contador++;
			}
			Craft avion3 = CraftFactory.createCraft("aircraft.Transport", Orientation.values()[random.nextInt(4)]);
			contador = 0;
			introducido = false;
			while(contador != 100 && introducido == false) {
				try {
					Coordinate c = genRandomCoordinate(b, Craft.BOUNDING_SQUARE_SIZE);
					b.addCraft(avion3, c);
					introducido = true;
				} catch (OccupiedCoordinateException | NextToAnotherCraftException | InvalidCoordinateException e) {}
				contador++;
			}
		}
	}

	@Override
	public Coordinate nextShoot(Board b) throws CoordinateAlreadyHitException, InvalidCoordinateException {
		Coordinate c = genRandomCoordinate(b, 0);
		lastShotStatus = b.hit(c);
		return c;
	}
	private int genRandomInt(int min, int max) { 
	    return random.nextInt(max-min)+min;
	}
	private Coordinate genRandomCoordinate(Board b, int offset) {
		if(b instanceof Board2D) {
			int x =genRandomInt(0-offset, b.getSize());
			int y =genRandomInt(0-offset, b.getSize());
			Coordinate c = CoordinateFactory.createCoordinate(x,y);
			return c;
		}
		if(b instanceof Board3D) {
			int x =genRandomInt(0-offset, b.getSize());
			int y =genRandomInt(0-offset, b.getSize());
			int z =genRandomInt(0-offset, b.getSize());
			Coordinate c = CoordinateFactory.createCoordinate(x,y,z);
			return c;
		}
		return null;
	}
	@Override
	public CellStatus getLastShotStatus() {
		return lastShotStatus;
	}
}
