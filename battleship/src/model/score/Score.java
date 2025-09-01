package model.score;

import model.io.IPlayer;

public abstract class Score<T> implements Comparable<Score<T>> {
	protected int score;
	private IPlayer player;
	public Score(IPlayer player) {
		if(player != null) {
			this.player = player;
			score = 0;
		}
		else {
			throw new NullPointerException();
		}
	}
	public int getScore() {
		return score;
	}
	public int compareTo(Score<T> other) {
		if(score != other.score) {
			if(score < other.score) {
				return 1;
			}
			else {
				return -1;
			}
		}
		else {
			return player.getName().compareTo(other.player.getName());
		}
	}
	public String toString() {
		return player.getName() + ": " + score;
	}
	public abstract void score(T sc);
}
