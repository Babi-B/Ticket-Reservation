journeyData = [
  {
    id: 1,
    time: 'Morning',
    journeys: [
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Yaounde',
        cost: '1500frs',
      },
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Douala',
        cost: '1500frs',
      },
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Bamenda',
        cost: '1500frs',
      },
    ],
  },
  {
    id: 1,
    time: 'Afernoon',
    journeys: [
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Yaounde',
        cost: '1500frs',
      },
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Douala',
        cost: '1500frs',
      },
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Bamenda',
        cost: '1500frs',
      },
    ],
  },
  {
    id: 1,
    time: 'Evening',
    journeys: [
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Yaounde',
        cost: '1500frs',
      },
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Douala',
        cost: '1500frs',
      },
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Bamenda',
        cost: '1500frs',
      },
    ],
  },
  {
    id: 1,
    time: 'Night',
    journeys: [
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Yaounde',
        cost: '1500frs',
      },
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Douala',
        cost: '1500frs',
      },
      {
        img: '../../../res/images/electricbus.jpeg',
        time: '8:00',
        name: 'Buea-Bamenda',
        cost: '1500frs',
      },
    ],
  },
];

document.getElementById('house').innerHTML = `
    ${journeyData
      .map((item) => {
        return `
          <h1 class="morning">${item.time}</h1>
            <section class="sect-1">
               ${item.journeys
                 .map((cardItem) => {
                   return `
                        <a href="../Ticket/Ticket.php" class="card box">
                            <img src=${cardItem.img} alt="" />
                            <ul>
                                <li>Name : ${cardItem.name}</li>
                                <li>Cost : ${cardItem.cost}</li>
                            </ul>
                        </a>
                   `;
                 })
                 .join('')}
            </section>
        `;
      })
      .join('')}
`;
