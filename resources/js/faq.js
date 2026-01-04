document.addEventListener('DOMContentLoaded', () => {
    
    // FAQ Accordion functionality
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.closest('.faq-item');
            const answer = faqItem.querySelector('.faq-answer');
            const icon = this.querySelector('.faq-icon');
            
            // Close other open FAQs (optional - remove if you want multiple open)
            document.querySelectorAll('.faq-item').forEach(item => {
                if (item !== faqItem) {
                    item.querySelector('.faq-answer').classList.add('hidden');
                    item.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current FAQ
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                answer.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });

    console.log('Help page loaded successfully');
});