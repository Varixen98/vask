const cardNumberForm = document.getElementById('card_number')
const expireDateForm = document.getElementById('expire_date')
const cvvForm = document.getElementById('cvv')


cvvForm.addEventListener('input', (event) => {
    let value =  event.target.value.replace(/\D/g, '')
    value = value.substring(0, 3)

    event.target.value = value
})

cardNumberForm.addEventListener('input', (event) =>{
    let value = event.target.value.replace(/\D/g, '')
    console.log("You have inputted: ", value)

    value = value.substring(0, 16)

    let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value

    event.target.value = formattedValue
})


expireDateForm.addEventListener('input', (event) =>{
    let value = event.target.value.replace(/\D/g, '')
    console.log("You have inputted: ", value)

    value = value.substring(0, 6);

    if(value.length >= 2){
        let month = parseInt(value.substring(0, 2))

        if(month > 12){
            value = '12' + value.substring(2)
        }

        if(month == 0){
            value = '01' + value.substring(2)
        }
    }

    if(value.length >= 3){
        value =  value.substring(0, 2) + '/' + value.substring(2)
    }

    event.target.value = value
})