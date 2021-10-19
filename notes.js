
    let groupsTable = document.createElement('table');
    
    groupsTable.style.width = "70%";
    var hdrGroupName = document.createElement('th');
    var hdrStudCount = document.createElement('th');
    var hdrDeleteTable = document.createElement('th');
    var headerRow = groupsTable.insertRow(0);

    hdrGroupName.innerHTML = "Group Name";
    headerRow.appendChild(hdrGroupName);
    hdrStudCount.innerHTML = "Total Students";
    headerRow.appendChild(hdrStudCount);
    hdrDeleteTable.innerHTML = "Delete Group";
    headerRow.appendChild(hdrDeleteTable);
    
    var row = groupsTable.insertRow(1);
    var cellGroupName = row.insertCell(0);
    var celltotalStudents = row.insertCell(1);
    var deleteButton = document.createElement("button"); //The delete button for the group.
    var deleteCell = row.insertCell(2);
    var openRows = row.insertCell(3);
     
    cellGroupName.innerHTML = "Group 1";
    celltotalStudents.innerHTML = "5";
    deleteButton.id = "del-" + 1;
    deleteButton.setAttribute('onclick', 'deleteRow(this.id)');
    deleteButton.className = "delete_button";
    deleteButton.innerHTML = "Delete Group";
    deleteCell.innerHTML = deleteButton.outerHTML;
    openRows.id = "openRow"+ 1;

    var imgTag = document.createElement("img");
    imgTag.src = "../icons/delete_black_24dp.svg";
    openRows.appendChild(imgTag);  
    document.body.appendChild(groupsTable);









    let groupMembersTable = document.createElement('table');
    groupMembersTable.id = "dsoGroups"+1; //now the group ID needs to be unique, how can we make sure that we create a group id that is unique?/
    //Well remember we have the element Id
    groupMembersTable.style.width = "70%";
    var hdrGroupName = document.createElement('th');
    var hdrStudNumber = document.createElement('th');
    var hdrFirstName = document.createElement('th');
    var hdrLastName= document.createElement('th');
    var hdrGender= document.createElement('th');
    var headerRow = groupMembersTable.insertRow(0);

    //Give the header captions
    hdrGroupName.innerHTML = "Group Name";
    headerRow.appendChild(hdrGroupName);
    hdrStudNumber.innerHTML = "Stud Number";
    headerRow.appendChild(hdrStudNumber);
    hdrFirstName.innerHTML = "First Name";
    headerRow.appendChild(hdrFirstName);
    hdrLastName.innerHTML = "Last Name";
    headerRow.appendChild(hdrLastName);
    hdrGender.innerHTML = "Gender";
    headerRow.appendChild(hdrGender);
    ​
    var row = groupMembersTable.insertRow(1);
    // <a data-testid="linkElement" href="https://www.instagram.com/isizweagency/" target="_blank"  rel="nofollow noopener"><img src="instagram.webp" alt="Isizwe Recruitment Agency"></a>
    // var aTag = document.createAttribute('a');
    //Let us now create the cells that we are going to use in our group table

    //============================
    //Create  6  cells
    //====================
    var cellGroupId= row.insertCell(0);
    var cellGroupName = row.insertCell(1);
    var cellMemberID = row.insertCell(2);
    var cellMemberMark = row.insertCell(3);
    var cellStudNumber = row.insertCell(4);
    var cellLectureGroupID = row.insertCell(5);



    row = document.createElement("tr");
    var hdrGroupName = document.createElement('th');
    var hdrStudNumber = document.createElement('th');
    var hdrFirstName = document.createElement('th');
    var hdrLastName= document.createElement('th');
    var hdrGender= document.createElement('th');
    var headerRow = row.insertRow(0);


        //Give the header captions
        hdrGroupName.innerHTML = "Group Name";
        headerRow.appendChild(hdrGroupName);
        hdrStudNumber.innerHTML = "Stud Number";
        headerRow.appendChild(hdrStudNumber);
        hdrFirstName.innerHTML = "First Name";
        headerRow.appendChild(hdrFirstName);
        hdrLastName.innerHTML = "Last Name";
        headerRow.appendChild(hdrLastName);
        hdrGender.innerHTML = "Gender";
        headerRow.appendChild(hdrGender);

        var cellGroupId= row.insertCell(0);
        var cellGroupName = row.insertCell(1);
        var cellMemberID = row.insertCell(2);
        var cellMemberMark = row.insertCell(3);
        var cellStudNumber = row.insertCell(4);
        var cellLectureGroupID = row.insertCell(5);

    myRow.appendChild(row);
        ​


    // document.getElementById("openRow1").style.backgroundImage = 'url(buttons/' + imagePrefix + '.png)';



    var myTable = document.getElementById("dsoGroups");
    row = myTable.tBodies[0].insertRow(24);

    var hdrGroupName = document.createElement('th');
    var hdrStudNumber = document.createElement('th');
    var hdrFirstName = document.createElement('th');
    var hdrLastName= document.createElement('th');
    var hdrGender= document.createElement('th');



    hdrGroupName.innerHTML = "Group Name";
    row.appendChild(hdrGroupName);
    hdrStudNumber.innerHTML = "Stud Number";
    row.appendChild(hdrStudNumber);
    hdrFirstName.innerHTML = "First Name";
    row.appendChild(hdrFirstName);
    hdrLastName.innerHTML = "Last Name";
    row.appendChild(hdrLastName);
    hdrGender.innerHTML = "Gender";
    row.appendChild(hdrGender);


    var cellGroupId= row.insertCell(0);
    var cellGroupName = row.insertCell(1);
    var cellMemberID = row.insertCell(2);
    var cellMemberMark = row.insertCell(3);
    var cellStudNumber = row.insertCell(4);
    var cellLectureGroupID = row.insertCell(5);

    //Insert another row.
    row = myTable.tBodies[0].insertRow(25);

    var tdGroupName = document.createElement('td');
    var tdStudNumber = document.createElement('td');
    var tdFirstName = document.createElement('td');
    var tdLastName= document.createElement('td');
    var tdGender= document.createElement('td');

    tdGroupName.innerHTML = "Group A";
    row.appendChild(tdGroupName);
    tdStudNumber.innerHTML = "216955960";
    row.appendChild(tdStudNumber);
    tdFirstName.innerHTML = "Shiko";
    row.appendChild(tdFirstName);
    tdLastName.innerHTML = "Matlala";
    row.appendChild(tdLastName);
    tdGender.innerHTML = "M";
    row.appendChild(tdGender);

    //Now the next step is to greate more rows to add data to them