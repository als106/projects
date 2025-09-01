/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.exceptions;

import model.Coordinate;
/** Esta clase representa la excepcion 'NextToAnotherCraftException'
* que hereda de la superclase 'BattleshipException' compuesta por dos metodos
* el constructor y el getMessage()
*/
@SuppressWarnings("serial")
public class NextToAnotherCraftException extends CoordinateException {
	/**
	 * Constructor de la clase 'NextToAnotherCraftException'
	 * que da valores al atributo Coordinate
	 * @param c Coordinate
	 */
	public NextToAnotherCraftException(Coordinate c) {
		super(c);
	}
	/**
	 * Metodo getMessage()
	 * @return string
	 */
	public String getMessage() {
		return "NextToAnotherCraftException\n";
	}
}
