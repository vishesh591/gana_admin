<?php
// Vendor scripts partial
// Contains all JavaScript libraries and custom scripts
?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Feather Icons -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<!-- Your custom scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Feather Icons
        if (feather) {
            feather.replace({
                width: 20,
                height: 20
            });
        }

        // Step titles for header
        const stepTitles = {
            1: 'Metadata',
            2: 'Uploads',
            3: 'Stores',
            4: 'Date & Price',
            5: 'Terms'
        };

        // Step Navigation
        const steps = document.querySelectorAll('.step');
        const stepContents = document.querySelectorAll('.step-content');

        document.querySelectorAll('.next-step').forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.step-content');
                const nextStepId = this.getAttribute('data-next');

                // Validate current step before proceeding
                if (validateStep(currentStep.id)) {
                    currentStep.classList.remove('active');
                    document.getElementById(`step-${nextStepId}`).classList.add('active');

                    // Update step indicator
                    steps.forEach(step => {
                        if (parseInt(step.getAttribute('data-step')) <= parseInt(nextStepId)) {
                            step.classList.add('completed');
                        } else {
                            step.classList.remove('completed');
                        }

                        if (parseInt(step.getAttribute('data-step')) === parseInt(nextStepId)) {
                            step.classList.add('active');
                        } else {
                            step.classList.remove('active');
                        }
                    });

                    // Update header title
                    document.querySelector('.current-step-title').textContent = stepTitles[nextStepId];

                    // Scroll to top of form
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            });
        });

        document.querySelectorAll('.prev-step').forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.step-content');
                const prevStepId = this.getAttribute('data-prev');

                currentStep.classList.remove('active');
                document.getElementById(`step-${prevStepId}`).classList.add('active');

                // Update step indicator
                steps.forEach(step => {
                    if (parseInt(step.getAttribute('data-step')) === parseInt(prevStepId)) {
                        step.classList.add('active');
                    } else {
                        step.classList.remove('active');
                    }
                });

                // Update header title
                document.querySelector('.current-step-title').textContent = stepTitles[prevStepId];

                // Scroll to top of form
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });

        // File Upload Preview
        document.getElementById('artworkUpload').addEventListener('click', function() {
            document.getElementById('artworkFile').click();
        });

        document.getElementById('artworkFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const preview = document.getElementById('artworkPreview');
                    preview.src = event.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('audioUpload').addEventListener('click', function() {
            document.getElementById('audioFile').click();
        });

        // Toggle All functionality for stores
        document.querySelectorAll('.toggle-all').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const checkboxes = document.getElementById(targetId).querySelectorAll('input[type="checkbox"]');
                const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

                checkboxes.forEach(checkbox => {
                    checkbox.checked = !allChecked;
                });
            });
        });

        // Form validation
        function validateStep(stepId) {
            const step = document.getElementById(stepId);
            const requiredFields = step.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            return isValid;
        }

        // Form submission
        document.getElementById('releaseForm').addEventListener('submit', function(e) {
            e.preventDefault();

            if (validateStep('step-5')) {
                // Here you would typically submit the form data to the server
                alert('Release submitted successfully!');
                // window.location.href = '/releases'; // Redirect to releases page
            }
        });
    });
</script>