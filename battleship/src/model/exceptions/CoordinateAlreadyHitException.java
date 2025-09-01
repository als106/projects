/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.exceptions;

import model.Coordinate;
/** Esta clase representa la excepcion 'CoordinateAlreadyHitException'
* que hereda de la superclase 'BattleshipException' compuesta por dos metodos
* el constructor y el getMessage()
*/
@SuppressWarnings("serial")
public class CoordinateAlreadyHitException extends CoordinateException {
	/**
	 * Constructor de la clase 'CoordinateAlreadyHitException'
	 * que da valores al atributo Coordinate
	 * @param c coordinate
	 */
	public CoordinateAlreadyHitException(Coordinate c) {
		super(c);
	}
	/**
	 * Metodo getMessage()
	 * @return string
	 */
	public String getMessage() {
		return "CoordinateAlreadyHitException";
	}
}
