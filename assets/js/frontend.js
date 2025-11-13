/**
 * Marketeria Landing Page Analyzer - Frontend JavaScript
 * Enhanced UX with progress indicators and smooth transitions
 */

(function($) {
    'use strict';
    
    $(document).ready(function() {
        const $form = $('#mlpa-analyzer-form');
        const $submitBtn = $('.mlpa-submit-btn');
        const $btnText = $('.mlpa-btn-text');
        const $btnLoader = $('.mlpa-btn-loader');
        const $message = $('#mlpa-message');
        const $progress = $('#mlpa-progress');
        const $success = $('#mlpa-success');
        
        // Form submission handler
        $form.on('submit', function(e) {
            e.preventDefault();
            
            // Reset states
            $message.hide().removeClass('success error');
            
            // Validate form
            if (!validateForm()) {
                return;
            }
            
            // Disable submit button and show loader
            $submitBtn.prop('disabled', true);
            $btnText.hide();
            $btnLoader.show();
            
            // Hide form and show progress
            setTimeout(function() {
                $form.fadeOut(400, function() {
                    $progress.fadeIn(400);
                    animateProgress();
                });
            }, 500);
            
            // Prepare form data
            const formData = {
                action: 'mlpa_submit_analysis',
                nonce: mlpaData.nonce,
                name: $('#mlpa-name').val().trim(),
                email: $('#mlpa-email').val().trim(),
                url: $('#mlpa-url').val().trim(),
                challenge: $('#mlpa-challenge').val()
            };
            
            // Submit to WordPress AJAX
            $.ajax({
                url: mlpaData.ajaxUrl,
                type: 'POST',
                data: formData,
                timeout: 60000, // 60 seconds timeout
                success: function(response) {
                    if (response.success) {
                        // Show success state
                        setTimeout(function() {
                            $progress.fadeOut(400, function() {
                                $success.fadeIn(400);
                            });
                        }, 3000);
                    } else {
                        // Show error
                        showError(response.data.message || mlpaData.messages.error);
                        resetForm();
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = mlpaData.messages.error;
                    
                    if (status === 'timeout') {
                        errorMessage = 'A requisição demorou muito. Tente novamente.';
                    }
                    
                    showError(errorMessage);
                    resetForm();
                }
            });
        });
        
        /**
         * Validate form fields
         */
        function validateForm() {
            const name = $('#mlpa-name').val().trim();
            const email = $('#mlpa-email').val().trim();
            const url = $('#mlpa-url').val().trim();
            
            // Check required fields
            if (!name || !email || !url) {
                showError(mlpaData.messages.requiredFields);
                return false;
            }
            
            // Validate email format
            if (!isValidEmail(email)) {
                showError('Por favor, insira um email válido.');
                $('#mlpa-email').focus();
                return false;
            }
            
            // Validate URL format
            if (!isValidUrl(url)) {
                showError(mlpaData.messages.invalidUrl);
                $('#mlpa-url').focus();
                return false;
            }
            
            return true;
        }
        
        /**
         * Validate email format
         */
        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        /**
         * Validate URL format
         */
        function isValidUrl(url) {
            try {
                const urlObj = new URL(url);
                return urlObj.protocol === 'http:' || urlObj.protocol === 'https:';
            } catch (e) {
                return false;
            }
        }
        
        /**
         * Show error message
         */
        function showError(message) {
            $message
                .removeClass('success')
                .addClass('error')
                .html(message)
                .fadeIn(400);
            
            // Scroll to message
            $('html, body').animate({
                scrollTop: $message.offset().top - 100
            }, 400);
        }
        
        /**
         * Reset form to initial state
         */
        function resetForm() {
            $progress.fadeOut(400, function() {
                $form.fadeIn(400);
                $submitBtn.prop('disabled', false);
                $btnText.show();
                $btnLoader.hide();
            });
        }
        
        /**
         * Animate progress steps
         */
        function animateProgress() {
            const $steps = $('.mlpa-progress-step');
            let currentStep = 1;
            
            // Already showing step 1 as active, start with step 2
            const interval = setInterval(function() {
                if (currentStep < $steps.length) {
                    $steps.eq(currentStep - 1).removeClass('processing').addClass('active');
                    $steps.eq(currentStep).addClass('processing');
                    currentStep++;
                } else {
                    // Mark last step as complete
                    $steps.eq(currentStep - 1).removeClass('processing').addClass('active');
                    clearInterval(interval);
                }
            }, 2000); // Change step every 2 seconds
        }
        
        /**
         * Input validation feedback
         */
        $('#mlpa-email').on('blur', function() {
            const email = $(this).val().trim();
            if (email && !isValidEmail(email)) {
                $(this).css('border-color', '#e74c3c');
            } else {
                $(this).css('border-color', '');
            }
        });
        
        $('#mlpa-url').on('blur', function() {
            const url = $(this).val().trim();
            if (url && !isValidUrl(url)) {
                $(this).css('border-color', '#e74c3c');
            } else {
                $(this).css('border-color', '');
            }
        });
        
        /**
         * Auto-add https:// to URL if not present
         */
        $('#mlpa-url').on('blur', function() {
            const url = $(this).val().trim();
            if (url && !url.match(/^https?:\/\//i)) {
                $(this).val('https://' + url);
            }
        });
        
        /**
         * Remove error styling on input
         */
        $('.mlpa-input, .mlpa-select').on('focus', function() {
            $(this).css('border-color', '');
        });
    });
    
})(jQuery);
