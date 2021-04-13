<!-- contact -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#004445" id="contact" fill-opacity="1" d="M0,160L40,149.3C80,139,160,117,240,117.3C320,117,400,139,480,176C560,213,640,267,720,256C800,245,880,171,960,133.3C1040,96,1120,96,1200,117.3C1280,139,1360,181,1400,202.7L1440,224L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
</svg>
<section class="jumbotron">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 id="nama">Contact</h2>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-md-6 mb-5">
                <form action="<?php echo base_url('home/add'); ?>" class="form-horizontal" method="post">
                    <div class="mb-3">
                        <label for="nama" id="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" name="nama" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" id="nama" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="kontak" id="nama" class="form-label">Message</label>
                        <textarea class="textarea form-control" name="kontak" id="kontak" placeholder="Enter Your Massage" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->