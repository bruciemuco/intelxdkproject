/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
               
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        
        document.addEventListener('deviceready', this.onDeviceReady, false);
        //load the person list. 
        $(document).ready(function() {
                $.ajax({
                    url: "http://bricemuco.com/index.php/api/person",
                    method: "GET",
                    headers: {
                      "x-api-key": "12345"
                    }
                }).then(function(data) {
                   console.log(data);
                   htmlData = app.createPersonListGroupItems(data);
                   app.insertInnerHTML("person-list-group",htmlData)
                   
                   
                });
                $.ajax({
                    url: "http://bricemuco.com/index.php/api/task",
                    method: "GET",
                    headers: {
                      "x-api-key": "12345"
                    }
                }).then(function(data) {
                   console.log(data);
                   htmlData = app.createTaskListGroupItems(data);
                   app.insertInnerHTML("task-list-group",htmlData)
                   
                   
                });
            });
         
       
       
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        app.receivedEvent('deviceready');
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    },
    loadData: function(){
       
          test = 'test';
          document.getElementById("person-list-group").innerHTML = test;
    },
    createPersonListGroupItems: function(response){
         var html = '';
    
        // Step through the rows of the data to get the objects.
        for(var row in response) {
            // Step through the columns in
            // this row.
            html += '<li class="list-group-item" style="padding:17px 15px !important;">';
            html += response[row].email;
            html += '<a data-target="#PersonDetailModal" data-toggle="modal"><i style="float:right; font-size:30px;"class="fa fa-arrow-circle-o-right" ></i></a></li>';
            console.log(response[row].email);
        }
        return html;
    },
    createTaskListGroupItems: function(response){
         var html = '';
    
        // Step through the rows of the data to get the objects.
        for(var row in response) {
            // Step through the columns in
            // this row.
            html += '<li class="list-group-item" style="padding:17px 15px !important;"> Task ';
            html += response[row].id;
            html += '<a href="taskDetail.html"><i style="float:right; font-size:25px"class="fa fa-arrow-circle-o-right"></i></a></li>';
            console.log(response[row].email);
        }
        return html;
    },
    insertInnerHTML: function(id,html){
        var el = document.getElementById(id);
    
        if(!el) {
            alert('Element with id ' + id + ' not found.');
        }
        el.innerHTML = html;
    }
};
