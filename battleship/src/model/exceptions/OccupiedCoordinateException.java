/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.exceptions;

import model.Coordinate;
/** Esta clase representa la excepcion 'OccupiedCoordinateException'
* que hereda de la superclase 'BattleshipException' compuesta por dos metodos
* el constructor y el getMessage()
*/
@SuppressWarnings("serial")
public class OccupiedCoordinateException extends CoordinateException {
	/**
	 * Constructor de la clase 'OccupiedCoordinateException'
	 * que da valores al atributo Coordinate
	 * @param c Coordinate
	 */
	public OccupiedCoordinateException(Coordinate c) {
		super(c);
	}
	/**
	 * Metodo getMessage()
	 * @return string
	 */
	public String getMessage() {
		return "OccupiedCoordinateException\n";
	}

}
