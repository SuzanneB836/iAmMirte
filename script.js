document.addEventListener('DOMContentLoaded', function() {
    // JavaScript for Basic Card
    document.querySelector('.basic').addEventListener('click', function() {
        // Center the basic card horizontally
        this.style.position = 'absolute';
        this.style.top = '50%';
        this.style.left = '50%';
        this.style.transform = 'translateX(-50%) translateY(-50%)';
        
        // Hide the pioneer card
        document.querySelector('.pioneer').style.display = 'none';
    });

    // JavaScript for Pioneer Card
    document.querySelector('.pioneer').addEventListener('click', function() {
        // Center the pioneer card horizontally
        this.style.position = 'absolute';
        this.style.top = '50%';
        this.style.left = '50%';
        this.style.transform = 'translateX(-50%) translateY(-50%)';
        
        // Hide the basic card
        document.querySelector('.basic').style.display = 'none';
    });
});
