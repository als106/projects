/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.aircraft;

import model.Orientation;
/**
 * 
 * La siguiente clase es la encargada de crear Aircraft
 * del tipo Fighter, es una subclase de la clase Aircraft
 *
 */
public class Fighter extends Aircraft {
	/**
	 * Este metodo seria el constructor de la clase Fighter
	 * y es el encargado de mandar los atributos a la superclase Aircraft
	 * y de dar forma al atributo shape
	 * @param o orientacion
	 */
	public Fighter(Orientation o) {
		super(o, '⇄', "Fighter");
		shape = new int[][] {
			{ 0, 0, 0, 0, 0,
				0, 0, 1, 0, 0,	
				0, 1, 1, 1, 0,	
				0, 0, 1, 0, 0,
				0, 0, 1, 0, 0},
			{ 0, 0, 0, 0, 0,
					0, 0, 1, 0, 0,	
					1, 1, 1, 1, 0,	
					0, 0, 1, 0, 0,
					0, 0, 0, 0, 0},
			{ 0, 0, 1, 0, 0,
						0, 0, 1, 0, 0,	
						0, 1, 1, 1, 0,	
						0, 0, 1, 0, 0,
						0, 0, 0, 0, 0},
			{ 0, 0, 0, 0, 0,
							0, 0, 1, 0, 0,	
							0, 1, 1, 1, 1,	
							0, 0, 1, 0, 0,
							0, 0, 0, 0, 0}}; 
	}

	@Override
	public int getValue() {
		return 10;
	}

}
