package model;

import java.lang.reflect.Constructor;
import java.lang.reflect.InvocationTargetException;

public class CraftFactory {
	public static Craft createCraft(String type, Orientation orientation){
		try {
			Class<?> c;
			c = Class.forName("model."+type);
			Class<?>[] paramTypes = new Class[] {Orientation.class};
			Constructor<?> m = c.getConstructor(paramTypes);
			Object[] arguments = new Object[] {orientation};
			Craft craft = (Craft)m.newInstance(arguments);
			return craft;
		} catch (ClassNotFoundException | NoSuchMethodException | SecurityException | InstantiationException | IllegalAccessException | IllegalArgumentException | InvocationTargetException e) {
			return null;
		}
	}
}
