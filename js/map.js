       // Set the location to be shown on the map
        const latitude = 37.7749;
        const longitude = -122.4194;

        // Initialize the map
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: { lat: latitude, lng: longitude },
            });

            // Add a marker to the map
            const marker = new google.maps.Marker({
                position: { lat: latitude, lng: longitude },
                map: map,
                title: "Location",
            });
        }

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
