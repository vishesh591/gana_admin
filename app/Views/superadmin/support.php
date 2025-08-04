 <div class="content-page">
            <div class="content">
                <div class="container-xxl">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Support Center</h4>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card support-form-card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-4">How can we help you?</h5>
                                    <p class="text-muted text-center mb-4">
                                        Please fill out the form below with your inquiry, and we'll get back to you as soon as possible.
                                    </p>

                                    <form id="supportForm" action="#" method="POST">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailAddress" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="emailAddress" placeholder="Enter your email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" placeholder="What is your inquiry about?" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea class="form-control" id="message" rows="5" placeholder="Describe your issue or question in detail" required></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-submit">Submit Request</button>
                                        </div>
                                    </form>

                                    <div id="formSubmissionAlert" class="alert alert-success mt-4 d-none" role="alert">
                                        Thank you for your submission! We have received your request and will get back to you shortly.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>