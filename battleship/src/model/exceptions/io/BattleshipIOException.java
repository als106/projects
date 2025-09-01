package model.exceptions.io;

import model.exceptions.BattleshipException;

@SuppressWarnings("serial")
public class BattleshipIOException extends BattleshipException {
	String message;
	public BattleshipIOException(String m) {
		this.message = m;
	}
	public String getMessage() {
		return message;
	}
}
