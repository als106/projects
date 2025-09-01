package model;

import model.exceptions.CoordinateAlreadyHitException;
import model.exceptions.InvalidCoordinateException;
import model.exceptions.NextToAnotherCraftException;
import model.exceptions.OccupiedCoordinateException;
import model.exceptions.io.BattleshipIOException;
import model.io.IPlayer;
import model.io.IVisualiser;
import model.score.CraftScore;
import model.score.HitScore;

public class Game {
	private boolean gameStarted;
	private int nextToShoot;
	private int shootCounter;
	private IPlayer player1;
	private IPlayer player2;
	private Board board1;
	private Board board2;
	private HitScore hitScore1;
	private HitScore hitScore2;
	private CraftScore craftScore1;
	private CraftScore craftScore2;
	
	
	public Game(Board b1, Board b2, IPlayer p1, IPlayer p2) {
		if(b1 == null || b2 == null || p1 == null || p2 == null) {
			throw new NullPointerException();
		}
		else {
			board1 = b1;board2 = b2;player1 = p1;player2 = p2;gameStarted = false;
			hitScore1 = new HitScore(player1);hitScore2 = new HitScore(player2);
			craftScore1 = new CraftScore(player1);craftScore2 = new CraftScore(player2);
			
		}
	}
	public IPlayer getPlayer1() {
		return player1;
	}
	public IPlayer getPlayer2() {
		return player2;
	}
	public IPlayer getPlayerLastShoot() {
		if(shootCounter != 0) {
			if(nextToShoot == 1) {
				return player2;
			}
			else {
				return player1;
			}
		}
		else {
			return null;
		}
	}
	public Board getBoard1() {
		return board1;
	}
	public Board getBoard2() {
		return board2;
	}
	public void start() {
		try {
			player1.putCrafts(board1);
		} catch (InvalidCoordinateException | OccupiedCoordinateException | NextToAnotherCraftException
				| BattleshipIOException e) {
			throw new RuntimeException();
		}
		try {
			player2.putCrafts(board2);
		} catch (InvalidCoordinateException | OccupiedCoordinateException | NextToAnotherCraftException
				| BattleshipIOException e) {
			throw new RuntimeException();
		}
		nextToShoot = 1;
		gameStarted = true;
		shootCounter = 0;
	}
	public boolean gameEnded() {
		if(board1.areAllCraftsDestroyed() == true || board2.areAllCraftsDestroyed() == true) {
			return true;
		}
		else {return false;}
	}
	public boolean playNext() {
		if(nextToShoot == 1) {
			Coordinate c;
			try {
				c = player1.nextShoot(board2);
				if(c != null) {
					hitScore1.score(player1.getLastShotStatus());
					if(player1.getLastShotStatus() == CellStatus.DESTROYED) {
						craftScore1.score(board2.getCraft(c));
					}
					nextToShoot = 2;
					shootCounter++;
					return true;
				}
				else {
					return false;
				}
			} catch (CoordinateAlreadyHitException e) {
				System.out.println("Action by " + player1.getName() + ":" + e.getMessage());
				nextToShoot = 2;
				shootCounter++;
				return true;
			} catch (InvalidCoordinateException e) {
				throw new RuntimeException();
			} catch (BattleshipIOException e) {
				throw new RuntimeException();
			}
		}
		else {
			Coordinate c;
			try {
				c = player2.nextShoot(board1);
				if(c != null) {
					hitScore2.score(player2.getLastShotStatus());
					if(player2.getLastShotStatus() == CellStatus.DESTROYED) {
						craftScore2.score(board1.getCraft(c));
					}
					nextToShoot = 1;
					shootCounter++;
					return true;
				}
				else {
					return false;
				}
			} catch (CoordinateAlreadyHitException e) {
				System.out.println("Action by " + player2.getName() + ":" + e.getMessage());
				nextToShoot = 1;
				shootCounter++;
				return true;
			} catch (InvalidCoordinateException e) {
				throw new RuntimeException();
			} catch (BattleshipIOException e) {
				throw new RuntimeException();
			}
		}
	}
	public void playGame(IVisualiser visualiser) {
		start();
		visualiser.show();
		boolean hits = false;
		while(gameEnded() == false) {
			hits = playNext();
			if(hits == true) {
				visualiser.show();
			}
			else {
				break;
			}
		}
		visualiser.close();
	}
	public String toString() {
		String cadena = "";
		if((gameEnded() == true)&&(gameStarted == true)) {
			cadena += "=== GAME ENDED ===\n";
		}
		else {
			if(gameStarted == true) {
				cadena += "=== ONGOING GAME ===\n";
			}
			else {
				cadena += "=== GAME NOT STARTED ===\n";
			}
		}
		cadena += "==================================\n";
		cadena += player1.getName() + "\n";
		cadena += "==================================\n";
		cadena += board1.show(false);
		cadena += "\n==================================\n";
		cadena += player2.getName() + "\n";
		cadena += "==================================\n";
		cadena += board2.show(false);
		cadena += "\n==================================\n";
		cadena += "Number of shots: " + shootCounter;
		if((gameEnded() == true)&&(gameStarted == true)) {
			cadena += "\n";
			if(board1.areAllCraftsDestroyed() || board2.areAllCraftsDestroyed()) {
				if(board1.areAllCraftsDestroyed()) {
					cadena += player2.getName() + " wins";
				}
				else {
					cadena += player1.getName() + " wins";
				}
			}
			else {
				cadena += getPlayerLastShoot().getName() + " wins";
			}
		}
		return cadena;
	}
	public String getScoreInfo() {
		String cadena = "Player 1\n";
		cadena += "HitScore: " + hitScore1 + "\n";
		cadena += "CraftScore: " + craftScore1 + "\n";
		cadena += "--------------\n";
		cadena += "Player 2\n";
		cadena += "HitScore: " + hitScore2 + "\n";
		cadena += "CraftScore: " + craftScore2;
		return cadena;
	}
	public HitScore getHitScorePlayer1() {
		return hitScore1;
	}
	public HitScore getHitScorePlayer2() {
		return hitScore2;
	}
	public CraftScore getCraftScorePlayer1() {
		return craftScore1;
	}
	public CraftScore getCraftScorePlayer2() {
		return craftScore2;
	}
}
