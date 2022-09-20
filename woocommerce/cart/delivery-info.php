<tr class="cart-realization-time">
  <th>
    <?php esc_html_e( 'Przewidywany czas realizacji' , 'foreto' ); ?>
    <span onclick="toggleNext(this)">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
        <g id="icon" transform="translate(-2)">
          <path d="M8,15A7,7,0,1,0,1,8a7,7,0,0,0,7,7Zm0,1A8,8,0,1,0,0,8,8,8,0,0,0,8,16Z" transform="translate(2)" fill-rule="evenodd"/>
          <path d="M8.93,6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738,3.468c-.194.9.1,1.319.808,1.319A2.071,2.071,0,0,0,8.831,12l.088-.416a1.108,1.108,0,0,1-.686.246c-.275,0-.375-.193-.3-.533Z" transform="translate(2 0)"/>
          <circle cx="1" cy="1" r="1" transform="translate(9 3.5)"/>
        </g>
      </svg>
    </span>
    <div class="toggle" style="display: none;">
      <?= __('Informacje o dostawie', 'foreto') ?>
    </div>
  </th>
  <td>
    <?php
      $time = 7; //TODO: get value from delivery (how?)
      printf(__('%d dni roboczych', 'foreto'), $time);
    ?>
  </td>
</tr>