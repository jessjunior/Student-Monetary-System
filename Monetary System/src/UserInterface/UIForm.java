/*
 * This Class has no licence.
 */
package UserInterface;

import AppPackage.AnimationClass;
import com.jtattoo.plaf.texture.TextureLookAndFeel;
import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.net.*;
import java.util.Scanner;
import javax.swing.*;
import javazoom.jl.decoder.JavaLayerException;
import javazoom.jl.player.*;
import org.jdesktop.xswingx.PromptSupport;

/**
 * This is the user interface class for the Monetary System.
 * @author Kevin
 */
public abstract class UIForm extends javax.swing.JFrame {
        
        private Player audio;
        private boolean isCompleted = true;
        private boolean musicFound = true;
        final AnimationClass anime = new AnimationClass();
        private Scanner About;
        private String aboutContent = "";
        private boolean fileNotFound = false;

        /**
         * Creates a new instance of the application.
         */
        public UIForm() {
                initComponents();
                init();
               frameCreate.show();
        }
        
        /**
         * Initialises the initial states for this class
         */
        private void init(){
                getMusic(getClass().getResource("/Resources/music/music.mp3"));
                getAboutFile();
                
                lblCaps.setVisible(Toolkit.getDefaultToolkit().getLockingKeyState(KeyEvent.VK_CAPS_LOCK));
                frameLogin.setLocationRelativeTo(null);
                PromptSupport.setFocusBehavior(PromptSupport.FocusBehavior.SHOW_PROMPT, txtUserName);
                PromptSupport.setPrompt("@username", txtUserName);
                PromptSupport.setFocusBehavior(PromptSupport.FocusBehavior.SHOW_PROMPT, txtPassword);
                PromptSupport.setPrompt("e.g thisismypassword", txtPassword);
                
                frameCreate.pack();
                frameCreate.setLocationRelativeTo(null);
                PromptSupport.setFocusBehavior(PromptSupport.FocusBehavior.SHOW_PROMPT, txtUser);
                PromptSupport.setPrompt("@username", txtUser);
                PromptSupport.setFocusBehavior(PromptSupport.FocusBehavior.SHOW_PROMPT, txtSecret);
                PromptSupport.setPrompt("e.g thisismypassword", txtSecret);
                PromptSupport.setFocusBehavior(PromptSupport.FocusBehavior.SHOW_PROMPT, txtSecretRe);
                PromptSupport.setPrompt("e.g thisismypassword", txtSecretRe);
                
                frameAbout.setLocationRelativeTo(null);
        }
        
        private void getMusic(URL url) {
                try {
                        audio = new Player(new FileInputStream(new File(url.toURI())));
                } catch (FileNotFoundException | URISyntaxException | JavaLayerException e) {
                        musicFound = false;
                }
        }
        
        private void getAboutFile(){
                try {
                        int count = 0;
                        About = new Scanner(new FileInputStream(new File(getClass().getResource("/Resources/Docs/about.txt").toURI()))).useDelimiter("\n");
                        while (About.hasNext()) {
                                count++;
                                if (count == 1) {
                                        aboutContent = About.next();
                                } else {
                                        aboutContent += "\n" + About.next();
                                }
                        }
                        txtAreaAbout.setText(aboutContent);
                        txtAreaAbout.append("\n\n\n\n\n\n\n\n\t        THE END...");
                } catch (FileNotFoundException | URISyntaxException fnfe) {
                        fileNotFound = true;
                }
        }
        
        /**
         * Initialises movement of JTextArea in the About form
         */
        private void move() {
                new Thread() {
                        @Override
                        public void run() {
                                try {
                                        Thread.sleep(10);
                                        new Thread() {
                                                @Override
                                                public void run() {
                                                        try {
                                                                if (musicFound && isCompleted) {
                                                                        audio.play();
                                                                        audio.close();
                                                                }
                                                        } catch (Exception e) {
                                                        }
                                                }
                                        }.start();
                                        btnReplay.setVisible(false);
                                        anime.jTextAreaYUp(419, -935, 60, 1, scrlAbout);
                                        Thread.sleep(78500);
                                        btnReplay.setVisible(true);
                                } catch (InterruptedException e) {
                                        JOptionPane.showMessageDialog(null,"Sorry, Cannot do this at this time", "Error", JOptionPane.ERROR_MESSAGE);
                                        frameAbout.setVisible(false);
                                        frameLogin.setVisible(true);
                                }
                        }
                }.start();
        }
        
        /**
         * This method should be overridden to give an action to be performed on login. 
         */
        public abstract void loginAction();
        
        /**
         * This method should be overridden to give an action to be performed when creating an account
         */
        public abstract void createAction();
        
        /**
         * This method resizes an image to fit a component.
         * @param path The path to the image to be resized.
         * @param component The JComponent object that will contain the image.
         * @return The resized image as an ImageIcon object.
         * @throws NullPointerException if any of the parameters are empty/null.
         */
        private ImageIcon resizeImage(String path,JComponent component){
                return new ImageIcon(new ImageIcon(path).getImage().getScaledInstance(component.getWidth(),component.getHeight(),Image.SCALE_SMOOTH));
        }

        /**
         * This method is called from within the constructor to initialise the
         * form. WARNING: Do NOT modify this code. The content of this method is
         * always regenerated by the Form Editor.
         */
        @SuppressWarnings("unchecked")
        // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
        private void initComponents() {

                frameLogin = new javax.swing.JFrame();
                btnLogin = new javax.swing.JButton();
                txtUserName = new javax.swing.JTextField();
                jLabel1 = new javax.swing.JLabel();
                jLabel2 = new javax.swing.JLabel();
                txtPassword = new javax.swing.JPasswordField();
                btnCancel = new javax.swing.JButton();
                btnForgotPassword = new javax.swing.JButton();
                lblCaps = new javax.swing.JLabel();
                frameCreate = new javax.swing.JFrame();
                jLabel6 = new javax.swing.JLabel();
                btnCreate = new javax.swing.JButton();
                btnBackCreate = new javax.swing.JButton();
                jLabel3 = new javax.swing.JLabel();
                jLabel5 = new javax.swing.JLabel();
                txtUser = new javax.swing.JTextField();
                btnCancelCreate = new javax.swing.JButton();
                txtSecret = new javax.swing.JPasswordField();
                txtSecretRe = new javax.swing.JPasswordField();
                frameAbout = new javax.swing.JFrame();
                btnReplay = new javax.swing.JButton();
                scrlAbout = new javax.swing.JScrollPane();
                txtAreaAbout = new javax.swing.JTextArea();

                frameLogin.setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
                frameLogin.setTitle("Login");
                frameLogin.setResizable(false);
                frameLogin.setSize(new java.awt.Dimension(600, 270));
                frameLogin.getContentPane().setLayout(null);

                btnLogin.setText("Login");
                btnLogin.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
                btnLogin.addActionListener(new java.awt.event.ActionListener() {
                        public void actionPerformed(java.awt.event.ActionEvent evt) {
                                btnLoginActionPerformed(evt);
                        }
                });
                btnLogin.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnLoginKeyReleased(evt);
                        }
                });
                frameLogin.getContentPane().add(btnLogin);
                btnLogin.setBounds(180, 150, 90, 30);

                txtUserName.setFont(new java.awt.Font("Monospaced", 0, 14)); // NOI18N
                txtUserName.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnLoginKeyReleased(evt);
                        }
                });
                frameLogin.getContentPane().add(txtUserName);
                txtUserName.setBounds(180, 50, 330, 30);

                jLabel1.setFont(new java.awt.Font("Monospaced", 1, 18)); // NOI18N
                jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
                jLabel1.setText("UserName");
                frameLogin.getContentPane().add(jLabel1);
                jLabel1.setBounds(50, 50, 120, 30);

                jLabel2.setFont(new java.awt.Font("Monospaced", 1, 18)); // NOI18N
                jLabel2.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
                jLabel2.setText("Password");
                frameLogin.getContentPane().add(jLabel2);
                jLabel2.setBounds(50, 100, 120, 30);

                txtPassword.setFont(new java.awt.Font("Monospaced", 0, 14)); // NOI18N
                txtPassword.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnLoginKeyReleased(evt);
                        }
                });
                frameLogin.getContentPane().add(txtPassword);
                txtPassword.setBounds(180, 100, 330, 30);

                btnCancel.setText("Cancel");
                btnCancel.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
                btnCancel.addActionListener(new java.awt.event.ActionListener() {
                        public void actionPerformed(java.awt.event.ActionEvent evt) {
                                btnCancelActionPerformed(evt);
                        }
                });
                btnCancel.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnCancelKeyReleased(evt);
                        }
                });
                frameLogin.getContentPane().add(btnCancel);
                btnCancel.setBounds(420, 150, 90, 30);

                btnForgotPassword.setBackground(new java.awt.Color(0, 0, 0));
                btnForgotPassword.setFont(new java.awt.Font("Monospaced", 1, 12)); // NOI18N
                btnForgotPassword.setForeground(new java.awt.Color(255, 0, 0));
                btnForgotPassword.setText("Forgot Password?");
                btnForgotPassword.setBorder(null);
                btnForgotPassword.setContentAreaFilled(false);
                btnForgotPassword.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
                btnForgotPassword.addMouseListener(new java.awt.event.MouseAdapter() {
                        public void mouseEntered(java.awt.event.MouseEvent evt) {
                                btnForgotPasswordMouseEntered(evt);
                        }
                        public void mouseExited(java.awt.event.MouseEvent evt) {
                                btnForgotPasswordMouseExited(evt);
                        }
                });
                btnForgotPassword.addActionListener(new java.awt.event.ActionListener() {
                        public void actionPerformed(java.awt.event.ActionEvent evt) {
                                btnForgotPasswordActionPerformed(evt);
                        }
                });
                frameLogin.getContentPane().add(btnForgotPassword);
                btnForgotPassword.setBounds(290, 180, 112, 30);

                lblCaps.setForeground(new java.awt.Color(204, 0, 0));
                lblCaps.setText("Caps Lock Is On!");
                frameLogin.getContentPane().add(lblCaps);
                lblCaps.setBounds(410, 20, 100, 20);

                frameCreate.setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
                frameCreate.setTitle("Create an Account");
                frameCreate.setResizable(false);

                jLabel6.setFont(new java.awt.Font("Monospaced", 3, 18)); // NOI18N
                jLabel6.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
                jLabel6.setText("Password");
                jLabel6.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);

                btnCreate.setText("Create");
                btnCreate.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
                btnCreate.addActionListener(new java.awt.event.ActionListener() {
                        public void actionPerformed(java.awt.event.ActionEvent evt) {
                                btnCreateActionPerformed(evt);
                        }
                });
                btnCreate.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnCreateKeyReleased(evt);
                        }
                });

                btnBackCreate.setText("Back");
                btnBackCreate.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
                btnBackCreate.addActionListener(new java.awt.event.ActionListener() {
                        public void actionPerformed(java.awt.event.ActionEvent evt) {
                                btnBackCreateActionPerformed(evt);
                        }
                });
                btnBackCreate.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnBackCreateKeyReleased(evt);
                        }
                });

                jLabel3.setFont(new java.awt.Font("Monospaced", 3, 16)); // NOI18N
                jLabel3.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
                jLabel3.setText("Repeat Password");
                jLabel3.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);

                jLabel5.setFont(new java.awt.Font("Monospaced", 3, 18)); // NOI18N
                jLabel5.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
                jLabel5.setText("UserName");
                jLabel5.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);

                txtUser.setFont(new java.awt.Font("Monospaced", 0, 14)); // NOI18N
                txtUser.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnCreateKeyReleased(evt);
                        }
                });

                btnCancelCreate.setText("Cancel");
                btnCancelCreate.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
                btnCancelCreate.addActionListener(new java.awt.event.ActionListener() {
                        public void actionPerformed(java.awt.event.ActionEvent evt) {
                                btnCancelCreateActionPerformed(evt);
                        }
                });
                btnCancelCreate.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnCancelCreateKeyReleased(evt);
                        }
                });

                txtSecret.setFont(new java.awt.Font("Monospaced", 0, 14)); // NOI18N
                txtSecret.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnCreateKeyReleased(evt);
                        }
                });

                txtSecretRe.setFont(new java.awt.Font("Monospaced", 0, 14)); // NOI18N
                txtSecretRe.addKeyListener(new java.awt.event.KeyAdapter() {
                        public void keyReleased(java.awt.event.KeyEvent evt) {
                                btnCreateKeyReleased(evt);
                        }
                });

                javax.swing.GroupLayout frameCreateLayout = new javax.swing.GroupLayout(frameCreate.getContentPane());
                frameCreate.getContentPane().setLayout(frameCreateLayout);
                frameCreateLayout.setHorizontalGroup(
                        frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(frameCreateLayout.createSequentialGroup()
                                .addGap(26, 26, 26)
                                .addGroup(frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                        .addGroup(frameCreateLayout.createSequentialGroup()
                                                .addGap(110, 110, 110)
                                                .addComponent(btnBackCreate, javax.swing.GroupLayout.PREFERRED_SIZE, 110, javax.swing.GroupLayout.PREFERRED_SIZE)
                                                .addGap(100, 100, 100)
                                                .addComponent(btnCreate, javax.swing.GroupLayout.PREFERRED_SIZE, 110, javax.swing.GroupLayout.PREFERRED_SIZE)
                                                .addGap(110, 110, 110)
                                                .addComponent(btnCancelCreate, javax.swing.GroupLayout.PREFERRED_SIZE, 110, javax.swing.GroupLayout.PREFERRED_SIZE))
                                        .addGroup(frameCreateLayout.createSequentialGroup()
                                                .addGroup(frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                                        .addComponent(jLabel5, javax.swing.GroupLayout.PREFERRED_SIZE, 140, javax.swing.GroupLayout.PREFERRED_SIZE)
                                                        .addComponent(jLabel6, javax.swing.GroupLayout.PREFERRED_SIZE, 140, javax.swing.GroupLayout.PREFERRED_SIZE)
                                                        .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 154, javax.swing.GroupLayout.PREFERRED_SIZE))
                                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                                .addGroup(frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                                        .addComponent(txtSecret)
                                                        .addComponent(txtUser)
                                                        .addComponent(txtSecretRe, javax.swing.GroupLayout.DEFAULT_SIZE, 490, Short.MAX_VALUE))))
                                .addContainerGap(27, Short.MAX_VALUE))
                );
                frameCreateLayout.setVerticalGroup(
                        frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(frameCreateLayout.createSequentialGroup()
                                .addGap(38, 38, 38)
                                .addGroup(frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                        .addComponent(jLabel5, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(txtUser, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(30, 30, 30)
                                .addGroup(frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jLabel6, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(txtSecret, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(30, 30, 30)
                                .addGroup(frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(txtSecretRe, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(30, 30, 30)
                                .addGroup(frameCreateLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                        .addComponent(btnBackCreate, javax.swing.GroupLayout.DEFAULT_SIZE, 35, Short.MAX_VALUE)
                                        .addComponent(btnCreate, javax.swing.GroupLayout.DEFAULT_SIZE, 35, Short.MAX_VALUE)
                                        .addComponent(btnCancelCreate, javax.swing.GroupLayout.DEFAULT_SIZE, 35, Short.MAX_VALUE))
                                .addContainerGap(39, Short.MAX_VALUE))
                );

                frameAbout.setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
                frameAbout.setTitle("About");
                frameAbout.setResizable(false);
                frameAbout.setSize(new java.awt.Dimension(684, 422));
                frameAbout.getContentPane().setLayout(null);

                btnReplay.setText("Replay");
                btnReplay.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
                btnReplay.addActionListener(new java.awt.event.ActionListener() {
                        public void actionPerformed(java.awt.event.ActionEvent evt) {
                                btnReplayActionPerformed(evt);
                        }
                });
                frameAbout.getContentPane().add(btnReplay);
                btnReplay.setBounds(10, 10, 68, 32);

                txtAreaAbout.setEditable(false);
                txtAreaAbout.setColumns(20);
                txtAreaAbout.setFont(new java.awt.Font("Palatino Linotype", 0, 18)); // NOI18N
                txtAreaAbout.setRows(5);
                scrlAbout.setViewportView(txtAreaAbout);

                frameAbout.getContentPane().add(scrlAbout);
                scrlAbout.setBounds(100, 419, 500, 1890);

                setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
                setSize(new java.awt.Dimension(680, 421));

                javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
                getContentPane().setLayout(layout);
                layout.setHorizontalGroup(
                        layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGap(0, 680, Short.MAX_VALUE)
                );
                layout.setVerticalGroup(
                        layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGap(0, 421, Short.MAX_VALUE)
                );

                pack();
        }// </editor-fold>//GEN-END:initComponents

        private void btnLoginActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnLoginActionPerformed
                loginAction();
        }//GEN-LAST:event_btnLoginActionPerformed

        private void btnCancelActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnCancelActionPerformed
                txtUserName.setText("");
                txtPassword.setText("");
                txtUserName.requestFocus();
        }//GEN-LAST:event_btnCancelActionPerformed

        private void btnForgotPasswordMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_btnForgotPasswordMouseEntered
                btnForgotPassword.setForeground(Color.BLACK);
        }//GEN-LAST:event_btnForgotPasswordMouseEntered

        private void btnForgotPasswordMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_btnForgotPasswordMouseExited
                btnForgotPassword.setForeground(Color.RED);
        }//GEN-LAST:event_btnForgotPasswordMouseExited

        private void btnForgotPasswordActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnForgotPasswordActionPerformed
                JOptionPane.showMessageDialog(null,"Please see Administrator to change password", "Information", JOptionPane.INFORMATION_MESSAGE);
        }//GEN-LAST:event_btnForgotPasswordActionPerformed

        private void btnCancelKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_btnCancelKeyReleased
                // TODO add your handling code here:
        }//GEN-LAST:event_btnCancelKeyReleased

        private void btnLoginKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_btnLoginKeyReleased
                switch (evt.getKeyCode()) {
                        case KeyEvent.VK_ENTER:
                        btnLogin.doClick();
                        break;
                        case KeyEvent.VK_ESCAPE:
                        System.exit(0);
                        default:
                        lblCaps.setVisible(Toolkit.getDefaultToolkit().getLockingKeyState(KeyEvent.VK_CAPS_LOCK));
                        break;
                }
        }//GEN-LAST:event_btnLoginKeyReleased

        private void btnCreateActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnCreateActionPerformed
                createAction();
        }//GEN-LAST:event_btnCreateActionPerformed

        private void btnBackCreateActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnBackCreateActionPerformed
                frameCreate.setVisible(false);
                txtUser.setText("");
                txtSecret.setText("");
                txtSecretRe.setText("");
                frameLogin.setVisible(true);
                txtUserName.setText("");
                txtPassword.setText("");
                txtUserName.requestFocus();
        }//GEN-LAST:event_btnBackCreateActionPerformed

        private void btnBackCreateKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_btnBackCreateKeyReleased
                switch (evt.getKeyCode()) {
                        case KeyEvent.VK_ENTER:
                        btnBackCreate.doClick();
                        break;
                        case KeyEvent.VK_ESCAPE:
                        System.exit(0);
                        default:
                       lblCaps.setVisible(Toolkit.getDefaultToolkit().getLockingKeyState(KeyEvent.VK_CAPS_LOCK));
                        break;
                }
        }//GEN-LAST:event_btnBackCreateKeyReleased

        private void btnCancelCreateActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnCancelCreateActionPerformed
                txtUser.setText("");
                txtSecret.setText("");
                txtSecretRe.setText("");
                txtUser.requestFocus();
        }//GEN-LAST:event_btnCancelCreateActionPerformed

        private void btnCancelCreateKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_btnCancelCreateKeyReleased
                switch (evt.getKeyCode()) {
                        case KeyEvent.VK_ENTER:
                        btnCancelCreate.doClick();
                        break;
                        case KeyEvent.VK_ESCAPE:
                        System.exit(0);
                        default:
                        lblCaps.setVisible(Toolkit.getDefaultToolkit().getLockingKeyState(KeyEvent.VK_CAPS_LOCK));
                        break;
                }
        }//GEN-LAST:event_btnCancelCreateKeyReleased

        private void btnCreateKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_btnCreateKeyReleased
                switch (evt.getKeyCode()) {
                        case KeyEvent.VK_ENTER:
                        btnCreate.doClick();
                        break;
                        case KeyEvent.VK_ESCAPE:
                        System.exit(0);
                        default:
                        lblCaps.setVisible(Toolkit.getDefaultToolkit().getLockingKeyState(KeyEvent.VK_CAPS_LOCK));
                        break;
                }
        }//GEN-LAST:event_btnCreateKeyReleased

        private void btnReplayActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnReplayActionPerformed
                scrlAbout.setLocation(100, 419);
                if (!audio.isComplete()) {
                        isCompleted = false;
                } else {
                        audio.close();
                        getMusic(getClass().getResource("/Resources/music/music.mp3"));
                        isCompleted = true;
                }
                move();
        }//GEN-LAST:event_btnReplayActionPerformed

        /**
         * @param args the command line arguments
         */
        public static void main(String args[]) {
                /* Set the Texture look and feel */
                //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
                // This look and feel is from an external library. If not available, an exception is thrown.
                try {
                        UIManager.setLookAndFeel(new TextureLookAndFeel());
                } catch (UnsupportedLookAndFeelException ex) {}
                //</editor-fold>

                /* Create and display the form */
                java.awt.EventQueue.invokeLater(() -> {
                        new UIForm() {
                                @Override
                                public void loginAction(){}
                                @Override
                                public void createAction(){}
                        };
                        
                });
        }

        // Variables declaration - do not modify//GEN-BEGIN:variables
        private javax.swing.JButton btnBackCreate;
        private javax.swing.JButton btnCancel;
        private javax.swing.JButton btnCancelCreate;
        private javax.swing.JButton btnCreate;
        private javax.swing.JButton btnForgotPassword;
        private javax.swing.JButton btnLogin;
        private javax.swing.JButton btnReplay;
        private javax.swing.JFrame frameAbout;
        private javax.swing.JFrame frameCreate;
        private javax.swing.JFrame frameLogin;
        private javax.swing.JLabel jLabel1;
        private javax.swing.JLabel jLabel2;
        private javax.swing.JLabel jLabel3;
        private javax.swing.JLabel jLabel5;
        private javax.swing.JLabel jLabel6;
        private javax.swing.JLabel lblCaps;
        private javax.swing.JScrollPane scrlAbout;
        private javax.swing.JTextArea txtAreaAbout;
        private javax.swing.JPasswordField txtPassword;
        private javax.swing.JPasswordField txtSecret;
        private javax.swing.JPasswordField txtSecretRe;
        private javax.swing.JTextField txtUser;
        private javax.swing.JTextField txtUserName;
        // End of variables declaration//GEN-END:variables
}
