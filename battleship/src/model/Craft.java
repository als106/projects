/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model;

import java.util.HashSet;
import java.util.Set;

import model.aircraft.Coordinate3D;
import model.exceptions.CoordinateAlreadyHitException;
import model.ship.Coordinate2D;

/**
 * Esta clase es la encargada de definir la diferentes
 * naves que vamos a usar en nuestro tablero
 */
public abstract class Craft {
	/**
	 * Tamaño limitado de la aeronave
	 */
	public static int BOUNDING_SQUARE_SIZE = 5;
	/**
	 * valor de coordenada alcanzada
	 */
	private static int HIT_VALUE = -1;
	/**
	 * valor de coordenada no alcanzada
	 */
	private static int CRAFT_VALUE = 1;
	/**
	 * simbolo de la nave
	 */
	protected char symbol;
	/**
	 * nombre de la nave
	 */
	protected String name;
	/**
	 * relacion con position
	 */
	Coordinate position;
	/**
	 * relacion con orientation
	 */
	Orientation orientation;
	/**
	 * atributo shape
	 */
	protected int shape[][];
	/**
	 * Constructor de la clase Craft encargado de dar valores a los atributos
	 * que se pasan como parametro y que forman parte de una nave
	 * @param o orientacion
	 * @param s simbolo
	 * @param n nombre
	 */
	public Craft(Orientation o,char s,String n) {
		this.orientation = o;
		this.symbol = s;
		this.name = n;
	}
	/**
	 * metodo que devuelve la posicion de la nave
	 * @return coordinate
	 */
	public Coordinate getPosition() {
		if(position != null) {
			Coordinate p = position.copy();
			return p;
		}
		else{
			return null;
		}
	}
	/**
	 * metodo privado adicional que devuelve el indicador de la orientacion de la nave
	 * @return orientacion
	 */
	private int getOrientationNum() {
		if(getOrientation()==Orientation.EAST) {
			return 1;
		}else {
			if(getOrientation()==Orientation.NORTH) {
				return 0;
			}else {
				if(getOrientation()==Orientation.SOUTH) {
					return 2;
				}else {
					return 3;
				}
			}
		}
	}
	/**
	 * metodo setter que establece la posicion en la que
	 * esta posicionada una nave
	 * @param position posicion
	 */
	public void setPosition(Coordinate position) {
		this.position = position.copy();
	}
	/**
	 * getter del nombre
	 * @return nombre
	 */
	public String getName() {
		return name;
	}
	/**
	 * getter de la orientacion
	 * @return orientacion
	 */
	public Orientation getOrientation() {
		return orientation;
	}
	/**
	 * getter del simbolo
	 * @return simbolo
	 */
	public char getSymbol() {
		return symbol;
	}
	/**
	 * getter de la forma de la nave
	 * @return vector
	 */
	public int[][] getShape() {
		return shape;
	}
	/**
	 * Este metodo nos devuelve la posicion dentro del vector shape de una
	 * coordenada relativa pasada como parametro
	 * @param c coordinate
	 * @return entero
	 */
	public int getShapeIndex(Coordinate c) {
		if(c != null) {
			return (c.get(1)*BOUNDING_SQUARE_SIZE)+c.get(0);
		}
		else {
			throw new NullPointerException();
		}
	}
	/**
	 * Este metodo devuelve las posiciones absolutas que ocupa una nave en
	 * un tablero y que recibe como parametro una coordenada
	 * @param c coordinate
	 * @return hashset
	 */
	public Set<Coordinate> getAbsolutePositions(Coordinate c) {
		if(c != null) {
			if(c instanceof Coordinate2D) {
				Set<Coordinate> absolutas = new HashSet<Coordinate>();
				for(int i = c.get(0);i < (c.get(0)+BOUNDING_SQUARE_SIZE);i++) {//COLUMNAS
					for(int j = c.get(1);j < (c.get(1)+BOUNDING_SQUARE_SIZE);j++) {//FILAS
						if(shape[getOrientationNum()][getShapeIndex(new Coordinate2D(i-c.get(0),j-c.get(1)))] == CRAFT_VALUE || shape[getOrientationNum()][getShapeIndex(new Coordinate2D(i-c.get(0),j-c.get(1)))] == HIT_VALUE) {
							absolutas.add(new Coordinate2D(i,j));
						}
					}
				}
				return absolutas;
			}
			else {
				Set<Coordinate> absolutas = new HashSet<Coordinate>();
				for(int i = c.get(0);i < (c.get(0)+BOUNDING_SQUARE_SIZE);i++) {//COLUMNAS
					for(int j = c.get(1);j < (c.get(1)+BOUNDING_SQUARE_SIZE);j++) {//FILAS
							if(shape[getOrientationNum()][getShapeIndex(new Coordinate3D(i-c.get(0),j-c.get(1),c.get(2)))] == CRAFT_VALUE || shape[getOrientationNum()][getShapeIndex(new Coordinate3D(i-c.get(0),j-c.get(1),c.get(2)))] == HIT_VALUE) {
								absolutas.add(new Coordinate3D(i,j,c.get(2)));
							}
					}
				}
				return absolutas;
			}
		}
		else {
			throw new NullPointerException();
		}
	}
	/**
	 * Metodo que invoca al metodo explicado anteriormente
	 * @return hashset
	 */
	public Set<Coordinate> getAbsolutePositions() {
		Set<Coordinate> absolutas = new HashSet<Coordinate>();
		absolutas = getAbsolutePositions(getPosition());
		return absolutas;
	}
	/**
	 * Metodo que simula en lanzamiento de un torpedo en el tablero
	 * sobre una nave en una coordenada pasada como parametro
	 * @param c coordinate
	 * @return boolean
	 * @throws CoordinateAlreadyHitException excepcion
	 */
	public boolean hit(Coordinate c) throws CoordinateAlreadyHitException {
		if(c instanceof Coordinate2D) {
			if(getPosition()!=null) {
				if(getAbsolutePositions().contains(c)) {
					if(shape[getOrientationNum()][getShapeIndex(new Coordinate2D(c.get(0)-getPosition().get(0),c.get(1)-getPosition().get(1)))]==CRAFT_VALUE) {
						shape[getOrientationNum()][getShapeIndex(new Coordinate2D(c.get(0)-getPosition().get(0),c.get(1)-getPosition().get(1)))] = HIT_VALUE;
						return true;
					}
					else {
						throw new CoordinateAlreadyHitException(c);
					}
				}
				else return false;
			}
			else {
				throw new NullPointerException();
			}
		}
		else {
			if(getPosition()!=null) {
				if(getAbsolutePositions().contains(c)) {
					if(shape[getOrientationNum()][getShapeIndex(new Coordinate3D(c.get(0)-getPosition().get(0),c.get(1)-getPosition().get(1),c.get(2)-getPosition().get(2)))]==CRAFT_VALUE) {
						shape[getOrientationNum()][getShapeIndex(new Coordinate3D(c.get(0)-getPosition().get(0),c.get(1)-getPosition().get(1),c.get(2)-getPosition().get(2)))] = HIT_VALUE;
						return true;
					}
					else {
						throw new CoordinateAlreadyHitException(c);
					}
				}
				else return false;
			}
			else {
				throw new NullPointerException();
			}
		}
	}
	/**
	 * metodo que devuelve si una nave ha sido hundida
	 * @return boolean
	 */
	public boolean isShotDown() {
		for(int i=0;i<shape[getOrientationNum()].length;i++) {
			if(shape[getOrientationNum()][i]==CRAFT_VALUE) {
				return false;
			}
		}
		return true;
	}
	/**
	 * metodo que devuelve si un torpedo ha podido alcanzar la posicion
	 * pasada como parametro o ha tocado agua
	 * @param c coordinate
	 * @return boolean
	 */
	public boolean isHit(Coordinate c) {
		if(getPosition()!=null) {
			if(getAbsolutePositions().contains(c)) {
				if(shape[getOrientationNum()][getShapeIndex(new Coordinate2D(c.get(0)-getPosition().get(0),c.get(1)-getPosition().get(1)))]==HIT_VALUE) {
					return true;
				}
				else {
					return  false;
				}
			}
			else {
				return false;
			}
		}
		else {
			throw new NullPointerException();
		}
	}
	/**
	 * metodo toString()
	 * @return string
	 */
	public String toString() {
		String cadena = getName() + " (" + getOrientation() + ")\n";
		cadena += " -----\n";
		for(int i=0;i<BOUNDING_SQUARE_SIZE;i++) {
			cadena += "|";
			for(int j=0;j<BOUNDING_SQUARE_SIZE;j++) {
				if(shape[getOrientationNum()][getShapeIndex(new Coordinate2D(j,i))] == 0) {
					cadena += Board.WATER_SYMBOL;
				}
				else {
					if(shape[getOrientationNum()][getShapeIndex(new Coordinate2D(j,i))] == CRAFT_VALUE) {
						cadena += getSymbol();
					}
					else {
						if(shape[getOrientationNum()][getShapeIndex(new Coordinate2D(j,i))] == HIT_VALUE) {
							cadena += Board.HIT_SYMBOL;
						}
					}
				}
				if(j==(BOUNDING_SQUARE_SIZE-1)) {
					cadena += "|\n";
				}
			}
		}
		cadena += " -----";
		return cadena;
	}
	public abstract int getValue();

}