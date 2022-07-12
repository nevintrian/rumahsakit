<footer class="py-5" style="background-color: #1f2b6c">
    <div class="container text-white">
        <div class="row">
            <div class="col-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <!-- Elemen yang akan menjadi kontainer peta -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d35452.60176584029!2d114.03938180063886!3d-8.294368651711622!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7eb4e15c4f93c80!2sRumah%20Sakit%20Bhakti%20Husada%20Krikilan%20Glenmore%20Banyuwangi%20%2F%20RS%20Krikilan!5e0!3m2!1sen!2sid!4v1657635975434!5m2!1sen!2sid" width="220" height="250" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </li>
                </ul>
            </div>

            <div class="col-2">
                <h5>Layanan</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="jadwalpoli" class="nav-link p-0 text-muted"><span class="text-white">Jadwal Poli</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="tentangkami" class="nav-link p-0 text-muted"><span class="text-white">Tentang Kami</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="home" class="nav-link p-0 text-muted"><span class="text-white"> Home</span></a>
                    </li>
                </ul>
            </div>

            <div class="col-3">
                <h5>Kontak Kami</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted"><span class="text-white">821118</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted"><span class="text-white">(0333) 821118 -
                                IGD</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted"><span class="text-white">Rumah Sakit Umum Bhakti
                                Husada</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted"><span class="text-white">Tentang Kami</span></a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted"><span class="text-white">Krikilan - Glenmore -
                                Banyuwangi</span></a>
                    </li>
                </ul>
            </div>

            <div class="col-3 offset-1">
                <form>
                    <i class="bi bi-envelope"></i>
                    <p>rolasmedika_rsubh@ptpn12.com</p>
                    <div class="d-flex w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address" />
                        <button class="btn btn-primary" type="button"><i class="bi bi-send"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>© 2022 RSU Bhakti Husada Krikilan Banyuwangi</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3">
                    <a class="link-light" href="#"><i class="bi bi-linkedin"></i></a>
                </li>
                <li class="ms-3">
                    <a class="link-light" href="#"><i class="bi bi-facebook"></i></a>
                </li>
                <li class="ms-3">
                    <a class="link-light" href="#"><i class="bi bi-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<!-- End Footer -->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<!-- Menyisipkan library Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
    // fungsi initialize untuk mempersiapkan peta
    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-8.5830695, 116.3202515),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    }

    // event jendela di-load
    google.maps.event.addDomListener(window, "load", initialize);
</script>
</body>

</html>