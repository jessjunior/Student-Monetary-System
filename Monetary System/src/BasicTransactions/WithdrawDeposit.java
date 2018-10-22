/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BasicTransactions;

import Class.DBUtils;
import java.sql.*;

/**
 *
 * @author Kevin
 */
public class WithdrawDeposit {
    DBUtils dbObject;
    String userName="root";
    String passWord="biggie5941";
    String url="jdbc:mysql://localhost/banking_system";
    Connection conn;
    ResultSet set;
    String accountNumber;
    String pin;
    String staffId;
    String password;
    
    public WithdrawDeposit(String accountNumber,String pin){
            this.accountNumber=accountNumber;
            this.pin=pin;
            connectToDatabase();
    }
    
    private boolean connectToDatabase(){
            dbObject=new DBUtils(userName,passWord,url);
            return dbObject.isConnectionSuccessful;
    }
    
    public boolean deposit(int amount) throws NumberFormatException,SQLException{
                set=dbObject.getResultSet("select * from accounts where acc_no="+Integer.parseInt(accountNumber));
                set.next();
                int initial=Integer.parseInt(set.getObject(4).toString());
                int balance=initial+amount;
                dbObject.execute("update accounts set balance="+balance+" where acc_no="+Integer.parseInt(accountNumber));
                set=dbObject.getResultSet("select * from log order by log_id asc");
                set.last();
                int temp=Integer.parseInt(set.getObject(1).toString());
                temp++;
                int logID=temp;
                int accno=Integer.parseInt(accountNumber);
                dbObject.execute("insert into log(log_id,acc_no,transactions,amount) values ("+logID+","+accno+",'Deposit',"+amount+")");
                return true;
    }
    
}
