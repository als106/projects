/**
 * @author Álvaro Lario Sánchez 23813883M
 */

package model.ship;

import model.Orientation;

/**
 * 
 * La siguiente clase es la encargada de crear ship
 * del tipo Battleship, es una subclase de la clase Ship
 *
 */

public class Battleship extends Ship {

	/**
	 * Este metodo seria el constructor de la clase Battleship
	 * y es el encargado de mandar los atributos a la superclase Ship
	 * y de dar forma al atributo shape
	 * @param o orientacion
	 */
	public Battleship(Orientation o) {
		super(o, 'O', "Battleship");
		shape = new int[][] {
			{ 0, 0, 0, 0, 0,
				0, 0, 1, 0, 0,	
				0, 0, 1, 0, 0,	
				0, 0, 1, 0, 0,
				0, 0, 1, 0, 0},
			{ 0, 0, 0, 0, 0,
					0, 0, 0, 0, 0,	
					0, 1, 1, 1, 1,	
					0, 0, 0, 0, 0,
					0, 0, 0, 0, 0},
			{ 0, 0, 0, 0, 0,
						0, 0, 1, 0, 0,	
						0, 0, 1, 0, 0,	
						0, 0, 1, 0, 0,
						0, 0, 1, 0, 0},
			{ 0, 0, 0, 0, 0,
							0, 0, 0, 0, 0,	
							0, 1, 1, 1, 1,	
							0, 0, 0, 0, 0,
							0, 0, 0, 0, 0}}; 
	}

	@Override
	public int getValue() {
		return 6;
	}

}
