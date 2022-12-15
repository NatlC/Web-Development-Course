<!DOCTYPE html>

<html>
    <head>
        <title>ASP Demonstration</title>
    </head>

    <%
        backgroundColor = Request.QueryString("Background")
        response.write ("<style> * {background-color:" & backgroundColor & ";} </style>")
    %>
    
    <body>
        <%
            bool = 0
            
            For Each key In Request.Cookies("time")
                bool = 1
            Next

            if bool = 0 then
                response.write("This is is your first visit")
            else
                For Each key In Request.Cookies("time")
                    Response.Write("Your last visit: <br>" & Request.Cookies("time")(key))
                Next
            end if

            Response.Cookies("time")("actualTime") = Date() & " " & DateAdd("h",1,Time())
        %>

        <h2>Query ex. http://lab10-cps530.somee.com/default.asp?Background=lightblue</h2>
    </body>
</html>