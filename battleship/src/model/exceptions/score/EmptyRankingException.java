package model.exceptions.score;

import model.exceptions.BattleshipException;

@SuppressWarnings("serial")
public class EmptyRankingException extends BattleshipException {
	public String getMessage() {
		return "EmptyRankingException";
	}
}
