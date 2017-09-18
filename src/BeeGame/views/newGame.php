<?php
/*
 * Renders the new game form to input how many worker and drone bees should be created
 */
?>
<h3>New Game</h3>
<p>Select how many bees of each type should be in next game</p>
<form action="" method="post">
  <input type="hidden" name="action" value="newGame">
  <table>
    <tr>
      <th>Type</th>
      <th>Amount</th>
    </tr>
    <tr>
      <th><label for="worker">Worker</label></th>
      <td><input id="worker" type="text" name="worker"></td>
    </tr>
    <tr>
      <th><label for="drone">Drone</label></th>
      <td><input id="drone" type="text" name="drone"></td>
    </tr>
    <tr><td></td><td><input type="submit" value="Start Game"></td></tr>
  </table>
</form>