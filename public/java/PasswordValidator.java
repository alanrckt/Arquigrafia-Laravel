import java.io.*;
import org.jasypt.util.password.BasicPasswordEncryptor;

public class PasswordValidator {
	
	public static void main (String args[])
	{
		final BasicPasswordEncryptor passwordEncryptor = new BasicPasswordEncryptor();
		
		try {
			System.out.println(passwordEncryptor.checkPassword(args[0], args[1]));
		
		}
		catch (Exception e)
		{
			e.printStackTrace();
			System.out.println("erro");
		}
	}

}