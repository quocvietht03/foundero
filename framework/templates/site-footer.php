<?php
/**
 * Site Footer
 *
 */

?>
<footer class="bt-site-footer">
  <div class="bt-container">
    <div class="bt-copyright">
      <?php
        printf(
          esc_html__( '© All right reserved by %s.', 'foundero' ),
          '<a href="' . esc_url( __( 'https://themeforest.net/user/bearsthemes/', 'foundero' ) ) . '" target="_blank">Bearsthemes</a>'
        );
      ?>
    </div>
  </div>
</footer>
