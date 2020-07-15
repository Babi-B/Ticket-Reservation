agencyData=[
  {
    id:'Buea',
    welcomeText:'Welcome To Buea',
    image: "../../../res/images/6.jpg",
    agencies:[
      {
        name:"Musango BUS SERVICE",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      {
        name:"GUARANTEE EXPRESS",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      {
        name:"AMOMEZAM",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },

    ]
  },
  {
    id:'Douala',
    welcomeText:'Welcome To Douala',
    image: "../../../res/images/6.jpg",
    agencies:[
      {
        name:"Musango BUS SERVICE",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      {
        name:"GUARANTEE EXPRESS",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      {
        name:"AMOMEZAM",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      
    ]
  },
  {
    id:'Bamenda',
    welcomeText:'Welcome To Bamenda',
    image: "../../../res/images/6.jpg",
    agencies:[
      {
        name:"Musango BUS SERVICE",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      {
        name:"GUARANTEE EXPRESS",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      {
        name:"AMOMEZAM",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      
    ]
  },
  {
    id:'Yaounde',
    welcomeText:'Welcome To Yaounde',
    image: "../../../res/images/6.jpg",
    agencies:[
      {
        name:"Musango BUS SERVICE",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      {
        name:"GUARANTEE EXPRESS",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      {
        name:"AMOMEZAM",
        journeyName: 'Buea-Yaounde',
        price:'5000frs'

      },
      
    ]
  }
];

document.getElementById('house').innerHTML=`
  ${agencyData.map((item)=>{
    return`
          <div id=${item.id} class="tabcontent">
            <h1>${item.welcomeText}</h1>
            <h2>Select Your agency of preference</h2>
            <img class="image" src=${item.image} alt="">

            <div class="cardfix">
              ${item.agencies.map((agency)=>{
                return`
                  <a href="#" class="card">
                    <div class="card-image"></div> 
                    <div class="card-text">
                     <span class="date">${agency.name}</span>
                    
                     <ul>      
                      <li>${agency.journeyName}</li><br>
                      Tariff: ${agency.price}frs
                     </ul>
                    </div>
                  </a>
                `
              }).join('')}
            </div>
          </div>
    `
  }).join('')}
`

function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
