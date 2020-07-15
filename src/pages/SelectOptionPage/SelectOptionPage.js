const data = [
    {
        id: 1,
        title: 'Board',
        image: '../../../res/images/bs2.jpeg',
        link: "../SelectRegionAndTown/SelectRegionAndTown.php",
        description: 'Here You can board a bus for a travell,you will have to select your region and town where you are'
    },
    {
        id: 2,
        title: 'Settings',
        image: '../../../res/images/s3.jpeg',
        link: "../SettingsPage/SettingPage.html",
        description: 'Go through your account settings and other settings like language, location and also premium services'
    },
    {
        id: 3,
        title: 'Location',
        image: '../../../res/images/l1.jpeg',
        link: "../GoogleMap/GoogleMap.html",
        description: 'Know our Location on Google maps and also more about us'
    },
    {
        id: 4,
        title: 'Entertainment',
        image: '../../../res/images/en.jpeg',
        link: "../Entertainment/index.html",
        description: 'Keep yourselt busy with some games and exciting videos and sounds'
    }
];

document.getElementById('house').innerHTML = `
${data.map((item) => {
    return `
            <a  href=${item.link} class= "listItem" id=${item.id}>
                <div class = "imageAndTitle">   
                    <img src = "${item.image}" class = "image" />
                    <p class = "title">${item.title}</p>
                </div>
                <div class = "descriptionContainer">
                    <p class = "description" >${item.description}</p>
                </div>
            </a>
    `
}).join('')}
`