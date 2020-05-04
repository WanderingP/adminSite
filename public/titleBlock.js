var titleBlock = {
    list : function () {
    // list() : show all 

      adm.load({
        url : "ajax-titleBlock.php",
        target : "container",
        data : {
          req : "list"
        }
      });
    },

    search : function(){
      adm.load({
        url : "ajax-titleBlock.php",
        target : "container",
        data : {
          req : "search",
          document_description : document.getElementById("search").value
        },
        ok : titleBlock.list
      });
      return false;
    },
    
  
    addEdit : function (id) {
    // addEdit()
    // PARAM id 
      adm.load({
        url : "ajax-titleBlock.php",
        target : "container",
        data : {
          req : "addEdit",
          id : id
        }
      });
    },
  
    save : function () {
    // save() 
      var id = document.getElementById("id").value;
      adm.ajax({
        url : "ajax-titleBlock.php",
        data : {
          req : (id=="" ? "add" : "edit"),
          id : id,
          handle : document.getElementById("handle").value,
          blockname : document.getElementById("blockname").value,
          project : document.getElementById("project").value,
          document_description : document.getElementById("document_description").value,
          project_id : document.getElementById("project_id").value,
          revision : document.getElementById("revision").value,
          scale : document.getElementById("scale").value,
          document_num : document.getElementById("document_num").value,
          drawn_by : document.getElementById("drawn_by").value,
          approved_by : document.getElementById("approved_by").value,
          checked_by : document.getElementById("checked_by").value,
          issued_by : document.getElementById("issued_by").value,
          drawn_date : document.getElementById("drawn_date").value,
          approved_date : document.getElementById("approved_date").value,
          checked_date : document.getElementById("checked_date").value,
          issued_date : document.getElementById("issued_date").value,
          purpose : document.getElementById("purpose").value,
          notes : document.getElementById("notes").value
        },
        ok : titleBlock.list
      });
      return false;
    },

    update : function () {
      // update() 
        var id = document.getElementById("id").value;
        adm.ajax({
          url : "ajax-titleBlock.php",
          data : {
            req : "update",
            id : id,
            handle : document.getElementById("handle").value,
            blockname : document.getElementById("blockname").value,
            project : document.getElementById("project").value,
            document_description : document.getElementById("document_description").value,
            project_id : document.getElementById("project_id").value,
            revision : document.getElementById("revision").value,
            scale : document.getElementById("scale").value,
            document_num : document.getElementById("document_num").value,
            drawn_by : document.getElementById("drawn_by").value,
            approved_by : document.getElementById("approved_by").value,
            checked_by : document.getElementById("checked_by").value,
            issued_by : document.getElementById("issued_by").value,
            drawn_date : document.getElementById("drawn_date").value,
            approved_date : document.getElementById("approved_date").value,
            checked_date : document.getElementById("checked_date").value,
            issued_date : document.getElementById("issued_date").value,
            purpose : document.getElementById("purpose").value,
            notes : document.getElementById("notes").value,
           
          },
        });
        return false;
      },

      revision : function () {
        // revision
          var id = document.getElementById("id").value;
          adm.ajax({
            url : "ajax-titleBlock.php",
            data : {
              req : "revision",
              id : id,
              handle : document.getElementById("handle").value,
              blockname : document.getElementById("blockname").value,
              project : document.getElementById("project").value,
              document_description : document.getElementById("document_description").value,
              project_id : document.getElementById("project_id").value,
              revision : document.getElementById("revision").value,
              scale : document.getElementById("scale").value,
              document_num : document.getElementById("document_num").value,
              drawn_by : document.getElementById("drawn_by").value,
              approved_by : document.getElementById("approved_by").value,
              checked_by : document.getElementById("checked_by").value,
              issued_by : document.getElementById("issued_by").value,
              drawn_date : document.getElementById("drawn_date").value,
              approved_date : document.getElementById("approved_date").value,
              checked_date : document.getElementById("checked_date").value,
              issued_date : document.getElementById("issued_date").value,
              purpose : document.getElementById("purpose").value,
              notes : document.getElementById("notes").value,
              revdrawn : document.getElementById("revdrawn").value,
              revchecked : document.getElementById("revchecked").value,
              revapproved : document.getElementById("revapproved").value,
              revdescription : document.getElementById("revdescription").value
             
            },
          });
          return false;
        },

  
    del : function (id) {
    // del() : delete
    // PARAM id 
      if (confirm("Delete?")) {
        adm.ajax({
          url : "ajax-titleBlock.php",
          data : {
            req : "del",
            id : id
          },
          ok : titleBlock.list
        });
      }
    },

    popup : function(){
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("popup");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on the button, open the modal
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
}



    }
  };
  
  window.addEventListener("load", titleBlock.list);

  