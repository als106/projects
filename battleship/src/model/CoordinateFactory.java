/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model;

import model.aircraft.Coordinate3D;
import model.ship.Coordinate2D;
/**
 * Clase encargada de crear una coordenada segun las dimensiones
 * que el usuario pasa como parametro al constructor, podriamos decir
 * que es una clase auxiliar de coordinate
 */
public class CoordinateFactory {
	/**
	 * Este metodo es el constructor de la clase 'CoordinateFactory' y que se encarga
	 * de crear una coordenada segun sea de dos o tres dimensiones
	 * @param coords dimensiones
	 * @return coordinate
	 */
	public static Coordinate createCoordinate(int... coords) {
		if(coords.length >=2 && coords.length <=3) {
			if(coords.length == 2) {
				Coordinate coord = new Coordinate2D(coords[0],coords[1]);
				return coord;
			}
			else {
				Coordinate coord = new Coordinate3D(coords[0],coords[1],coords[2]);
				return coord;
			}
		}
		else {
			throw new IllegalArgumentException();
		}
	}
}
