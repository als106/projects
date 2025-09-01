/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;
import java.util.Set;

import model.aircraft.Coordinate3D;
import model.exceptions.CoordinateAlreadyHitException;
import model.exceptions.InvalidCoordinateException;
import model.exceptions.NextToAnotherCraftException;
import model.exceptions.OccupiedCoordinateException;
import model.ship.Coordinate2D;
import model.ship.Ship;

/**
 * Esta clase es la encagada de crear tableros de diferentes dimesiones
 * y que nos servira para situar las diferentes naves en las diferentes
 * coordenadas de nuestro tablero
 */
public abstract class Board {
	/**
	 * simbolo hit
	 */
	public static char HIT_SYMBOL = '•';
	/**
	 * simbolo water
	 */
	public static char WATER_SYMBOL = ' ';
	/**
	 * simbolo posicion no vista
	 */
	public static char NOTSEEN_SYMBOL = '?';
	/**
	 * simbolo separacion de naves
	 */
	public static char BOARD_SEPARATOR = '|';
	/**
	 * delimitador maximo de tablero
	 */
	private static int MAX_BOARD_SIZE = 20;
	/**
	 * delimitador minimo de tablero
	 */
	private static int MIN_BOARD_SIZE = 5;
	/**
	 * atributo size
	 */
	private int size;
	/**
	 * atributo number crafts
	 */
	private int numCrafts;
	/**
	 * atributo destroyed crafts
	 */
	private int destroyedCrafts;
	/**
	 * set de coordenadas descubiertas
	 */
	protected Set<Coordinate> seen;
	/**
	 * mapa de la clase board
	 */
	protected Map<Coordinate, Craft> board;
	/**
	 * Este metodo es el constructor de la clase Board
	 * encargado de crear tableros dado un size
	 * @param size tamaño
	 */
	public Board(int size) {
		if ((size < MIN_BOARD_SIZE) || (size > MAX_BOARD_SIZE)) {
			throw new IllegalArgumentException();
		} else {
			this.size = size;
		}
		this.board = new HashMap<Coordinate, Craft>();
		this.seen = new HashSet<Coordinate>();
		this.numCrafts = 0;
		this.destroyedCrafts = 0;
	}
	/**
	 * getter de tamaño
	 * @return size
	 */
	public int getSize() {
		return size;
	}
	/**
	 * Este metodo es el encargado de comprobar que la coordenada introducida mediante
	 * parametro esta dentro de los limites del tablero
	 * @param c coordinate
	 * @return boolean
	 */
	abstract public boolean checkCoordinate(Coordinate c);
	/**
	 * Este metodo es el encargado de mostrar el tablero que estamos utilizando en nuestra
	 * clase Board y que devuelve una cadena con el mapa
	 * @param unveil boolean
	 * @return string
	 */
	public abstract String show(boolean unveil);
	/**
	 * Este metodo es el encargado de situar las naves en el tablero que 
	 * hemos creado y que recibe como parametros la nave en cuestion y la
	 * posicion dentro del tablero en la que tenemos que situarla
	 * @param craft nave 
	 * @param position posicion
	 * @return boolean
	 * @throws InvalidCoordinateException excepcion
	 * @throws OccupiedCoordinateException excepcion
	 * @throws NextToAnotherCraftException excepcion
	 */
	public Boolean addCraft(Craft craft, Coordinate position) throws InvalidCoordinateException, OccupiedCoordinateException, NextToAnotherCraftException {
		Set<Coordinate> absolutas = craft.getAbsolutePositions(position);
		Set<Coordinate> vecinas = new HashSet<Coordinate>();
		for (Coordinate c : absolutas) {
			if (checkCoordinate(c) == false) {
				throw new InvalidCoordinateException(c);
			}
		}
		for (Coordinate c : absolutas) {
			if (board.containsKey(c)) {
				throw new OccupiedCoordinateException(c);
			}
		}
		for (Coordinate c : absolutas) {
			if(c instanceof Coordinate2D) {
				for (int i = -1; i < 2; i++) {
					for (int j = -1; j < 2; j++) {
						if (!absolutas.contains(new Coordinate2D(c.get(0) + i, c.get(1) + j))) {
							vecinas.add(new Coordinate2D(c.get(0) + i, c.get(1) + j));
						}
					}
				}
			}
			else {
				for (int i = -1; i < 2; i++) {
					for (int j = -1; j < 2; j++) {
						for(int k=-1;k<2;k++) {
							if (!absolutas.contains(new Coordinate3D(c.get(0) + i, c.get(1) + j,c.get(2) +k))) {
								vecinas.add(new Coordinate3D(c.get(0) + i, c.get(1) + j,c.get(2)+k));
							}
						}
					}
				}
			}
		}
		for (Coordinate c : vecinas) {
			if (board.containsKey(c)) {
				throw new NextToAnotherCraftException(c);
			}
		}
		craft.setPosition(position);
		for (Coordinate c : absolutas) {
			board.put(c, craft);
		}
		numCrafts++;
		return true;

	}
	/**
	 * metodo que devuelve a partir de una coordenada la nave que esta situada
	 * en esa coordenada del tablero, si existe
	 * @param c coordinate
	 * @return nave
	 */
	public Craft getCraft(Coordinate c) {
		if (board.get(c) != null) {
			return board.get(c);
		} else {
			return null;
		}
	}
	/**
	 * metodo que comprueba si una coordenada ha sido descubierta anteriormente
	 * por otra nave
	 * @param c coordinate
	 * @return boleean
	 */
	public boolean isSeen(Coordinate c) {
		if (seen.contains(c)) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Metodo que simula en lanzamiento de un torpedo en el tablero
	 * sobre una nave en una coordenada pasada como parametro
	 * @param c coordinate
	 * @return tipo cellstatus
	 * @throws CoordinateAlreadyHitException excepcion
	 * @throws InvalidCoordinateException excepcion
	 */
	public CellStatus hit(Coordinate c) throws CoordinateAlreadyHitException, InvalidCoordinateException {
		if (checkCoordinate(c)) {
			seen.add(c.copy());
			if (getCraft(c) == null) {
				return CellStatus.WATER;
			} else {
				if (getCraft(c).isHit(c)) {
					getCraft(c).hit(c);
					if (getCraft(c).isShotDown()) {
						return CellStatus.DESTROYED;
					} else {
						return CellStatus.HIT;
					}
				} else {
					getCraft(c).hit(c);
					if (getCraft(c).isShotDown()) {
						Set<Coordinate> absolutas = getCraft(c).getAbsolutePositions();
						Set<Coordinate> vecinas = new HashSet<Coordinate>();
						if(c instanceof Coordinate2D) {
							for (Coordinate cord : absolutas) {
								for (int i = -1; i < 2; i++) {
									for (int j = -1; j < 2; j++) {
										if (!absolutas.contains(new Coordinate2D(cord.get(0) + i, cord.get(1) + j))) {
											vecinas.add(new Coordinate2D(cord.get(0) + i, cord.get(1) + j));
										}
									}
								}
							}
						}
						else {
							for (Coordinate cord : absolutas) {
								for (int i = -1; i < 2; i++) {
									for (int j = -1; j < 2; j++) {
										for(int k = -1; k < 2; k++) {
											if (!absolutas.contains(new Coordinate3D(cord.get(0) + i, cord.get(1) + j,cord.get(2) + k))) {
												vecinas.add(new Coordinate3D(cord.get(0) + i, cord.get(1) + j,cord.get(2) + k));
											}
										}
									}
								}
							}
						}
						for (Coordinate v : vecinas) {
							seen.add(v.copy());
						}
						destroyedCrafts++;
						return CellStatus.DESTROYED;

					}
					return CellStatus.HIT;
				}
			}
		} else {
			throw new InvalidCoordinateException(c);
		}
	}
	/**
	 * Metodo que comprueba si se han destruido todas las naves existentes
	 * @return boolean
	 */
	public boolean areAllCraftsDestroyed() {
		if (numCrafts == destroyedCrafts) {
			return true;
		} else
			return false;
	}
	/**
	 * Metodo que devuelve todas las posiciones que estan en vecindad
	 * junto a una nave
	 * @param ship nave
	 * @param position posicion
	 * @return vecindad
	 */
	public Set<Coordinate> getNeighborhood(Craft ship, Coordinate position) {
		if (ship != null && position != null) {
			Set<Coordinate> absolutas = ship.getAbsolutePositions(position);
			Set<Coordinate> vecinas = new HashSet<Coordinate>();
			if (position instanceof Coordinate2D) {
				for (Coordinate c : absolutas) {
					for (int i = -1; i < 2; i++) {
						for (int j = -1; j < 2; j++) {
							if (!absolutas.contains(new Coordinate2D(c.get(0) + i, c.get(1) + j))) {
								if (checkCoordinate(new Coordinate2D(c.get(0) + i, c.get(1) + j))) {
									vecinas.add(new Coordinate2D(c.get(0) + i, c.get(1) + j));
								}
							}
						}
					}
				}
				return vecinas;
			} else {
				for (Coordinate c : absolutas) {
					for (int i = -1; i < 2; i++) {
						for (int j = -1; j < 2; j++) {
							for (int k = -1; k < 2; k++) {
								if (!absolutas.contains(new Coordinate3D(c.get(0) + i, c.get(1) + j, c.get(2) + k))) {
									if (checkCoordinate(new Coordinate3D(c.get(0) + i, c.get(1) + j, c.get(2) + k))) {
										vecinas.add(new Coordinate3D(
												new Coordinate3D(c.get(0) + i, c.get(1) + j, c.get(2) + k)));
									}
								}
							}
						}
					}
				}
				return vecinas;
			}
		} else {
			throw new NullPointerException();
		}
	}
	/**
	 * Metodo que devuelve todas las posiciones en vecindad 
	 * de una nave y que se desarrolla en la anterior funcion
	 * @param ship nave
	 * @return vecindad
	 */
	public Set<Coordinate> getNeighborhood(Craft ship) {
		if (ship.getPosition() != null) {
			return getNeighborhood(ship, ship.getPosition());
		} else {
			throw new NullPointerException();
		}
	}
	/**
	 * metodo toString()
	 * @return string
	 */
	public String toString() {
		String cadena = "Board " + size + "; crafts: " + numCrafts + "; destroyed: " + destroyedCrafts;
		return cadena;
	}

}