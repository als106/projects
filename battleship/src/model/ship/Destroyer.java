/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.ship;

import model.Orientation;
/**
 * 
 * La siguiente clase es la encargada de crear ship
 * del tipo Destroyer, es una subclase de la clase Ship
 *
 */
public class Destroyer extends Ship {
	/**
	 * Este metodo seria el constructor de la clase Destroyer
	 * y es el encargado de mandar los atributos a la superclase Ship
	 * y de dar forma al atributo shape
	 * @param o orientacion
	 */
	public Destroyer(Orientation o) {
		super(o, 'Ω', "Destroyer");
		shape = new int[][] {
			{ 0, 0, 0, 0, 0,
				0, 0, 1, 0, 0,	
				0, 0, 1, 0, 0,	
				0, 0, 0, 0, 0,
				0, 0, 0, 0, 0},
			{ 0, 0, 0, 0, 0,
					0, 0, 0, 0, 0,	
					0, 1, 1, 0, 0,	
					0, 0, 0, 0, 0,
					0, 0, 0, 0, 0},
			{ 0, 0, 0, 0, 0,
						0, 0, 1, 0, 0,	
						0, 0, 1, 0, 0,	
						0, 0, 0, 0, 0,
						0, 0, 0, 0, 0},
			{ 0, 0, 0, 0, 0,
							0, 0, 0, 0, 0,	
							0, 1, 1, 0, 0,	
							0, 0, 0, 0, 0,
							0, 0, 0, 0, 0}};
	}

	@Override
	public int getValue() {
		return 3;
	}

}
