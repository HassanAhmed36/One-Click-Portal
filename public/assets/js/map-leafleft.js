$((function(){"use strict";var t=L.map("leaflet1").setView([51.505,-.09],13);L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(t);t=L.map("leaflet2").setView([51.505,-.09],13);L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(t),L.marker([51.5,-.09]).addTo(t).bindPopup("A pretty CSS3 popup.<br> Easily customizable.").openPopup();t=L.map("leaflet3").setView([51.505,-.09],13);L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(t),L.circle([51.508,-.11],{color:"red",fillColor:"#f03",fillOpacity:.5,radius:500}).addTo(t)}));