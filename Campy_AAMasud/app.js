const express = require('express');
const app = express();
/*app.use(express.static("./static"));
*/
app.set('view engine', 'ejs');

app.listen(3000);

app.get('/' ,(req,res)=>{
    res.send("HELLO");
})
app.use((req, res) => {
    res.send("404");
})