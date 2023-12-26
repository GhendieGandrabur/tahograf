<div class="row">
  <div class="col-s-12 col-12">
    <div class="col-s-2 col-2 ">

    </div>
    <div class="col-s-8 col-8 ">
      <div class="col-s-12 col-12 ">
        <h2>Servicii</h2>

        <div class="col-s-12 col-12 ">
          <div class="col-s-6 col-6 ">
            <h2>Tahografe</h2>
            <table>
              <tr>
                <th>Code</th>
                <th>Denumire</th>
                <th>Pret</th>
              </tr>
              <?php foreach ($services as $service) : ?>
                <?php if ($service->category == 1) : ?>
                  <tr>
                    <td><?= $service->code ?></td>
                    <td><?= $service->servicename ?></td>
                    <td><?= $service->price = $service->price == 0 ? "-" : $service->price; ?>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </table>
          </div>
          <div class="col-s-6 col-6 tc">
            <img src="/img/SE5000ADR.jpg" width="80%">
          </div>
        </div>

        <div class="col-s-12 col-12 ">
          <br>
          <div class="col-s-6 col-6 tc p1">
            <img src="/img/D2.jpg" width="50%">
          </div>

          <div class="col-s-6 col-6 ">
            <h2>Incalzitoare</h2>
            <table>
              <tr>
                <th>Code</th>
                <th>Denumire</th>
                <th>Pret</th>
              </tr>
              <?php foreach ($services as $service) : ?>
                <?php if ($service->category == 2) : ?>
                  <tr>
                    <td><?= $service->code ?></td>
                    <td><?= $service->servicename ?></td>
                    <td><?= $service->price = $service->price == 0 ? "-" : $service->price; ?>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </table>
          </div>
        </div>

        <div class="col-s-12 col-12 ">
          <div class="col-s-6 col-6 ">
            <h2>Radio</h2>
            <table>
              <tr>
                <th>Code</th>
                <th>Denumire</th>
                <th>Pret</th>
              </tr>
              <?php foreach ($services as $service) : ?>
                <?php if ($service->category == 3) : ?>
                  <tr>
                    <td><?= $service->code ?></td>
                    <td><?= $service->servicename ?></td>
                    <td><?= $service->price = $service->price == 0 ? "-" : $service->price; ?>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </table>
          </div>
          <div class="col-s-6 col-6 tc">
            <img src="/img/barry_yellowPNG.png" width="100%">
          </div>
        </div>
        <div class="col-s-12 col-12 ">
          <div class="col-s-6 col-6 tc">
            <img src="/img/verificare.jpeg" width="100%">
          </div>
          <div class="col-s-6 col-6 ">
            <h2>Frig</h2>
            <table>
              <tr>
                <th>Code</th>
                <th>Denumire</th>
                <th>Pret</th>
              </tr>
              <?php foreach ($services as $service) : ?>
                <?php if ($service->category == 5) : ?>
                  <tr>
                    <td><?= $service->code ?></td>
                    <td><?= $service->servicename ?></td>
                    <td><?= $service->price = $service->price == 0 ? "-" : $service->price; ?>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-s-2 col-2"></div>
  </div>
</div>