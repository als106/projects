package model.exceptions;

import model.Coordinate;

@SuppressWarnings("serial")
public abstract class CoordinateException extends BattleshipException {
	private Coordinate c;
	public CoordinateException(Coordinate c) {
		this.c = c;
	}
	public String getMessage() {
		return "Coordinate Exception: " + c;
	}
}
