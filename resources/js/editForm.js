const provinceSel = document.getElementById('province_id')
const citySel = document.getElementById('city_id')
const districtSel = document.getElementById('district_id')

provinceSel.addEventListener('change',  (event) => {
    const provinceId = event.target.value
    console.log("For Province you selected: ", provinceId)

    // CRITICAL FIX: Clear previous options before fetching new ones
    citySel.innerHTML = '<option value="">-- Select City --</option>';
    districtSel.innerHTML = '<option value="">-- Select District --</option>';
    
    // Disable them until data loads
    citySel.setAttribute('disabled', 'disabled');
    districtSel.setAttribute('disabled', 'disabled');

    if(provinceId){
        fetch(`/api/getCities?province_id=${provinceId}`).then(response => response.json()).then(data => {
            data.forEach(city => {
                const option = document.createElement('option');
                option.value = city.id;
                option.textContent = city.name;
                citySel.appendChild(option)
            });
            citySel.removeAttribute('disabled')
        })
        .catch(error => console.error('Error fetching cities:', error))
    }

    
})

citySel.addEventListener('change', (event) =>{
    const cityId = event.target.value
    console.log("For City you selected: ", cityId)

    // CRITICAL FIX: Clear previous options
    districtSel.innerHTML = '<option value="">-- Select District --</option>';
    districtSel.setAttribute('disabled', 'disabled');

    if(cityId){
        fetch(`/api/getDistricts?city_id=${cityId}`).then(response => response.json()).then(data => {
            data.forEach(district => {
                const option = document.createElement('option')
                option.value = district.id
                option.textContent = district.name
                districtSel.append(option)
            })
            districtSel.removeAttribute('disabled')
        })
        .catch(error => console.error('Error fetching districts:', error))
    }
    
})

// check value district
districtSel.addEventListener('change', (event) =>{
    const districtId = event.target.value
    console.log("For District you selected: ", districtId)
})