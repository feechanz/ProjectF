<style>
    h3
    {
        font-size: 1.0725em;
    }
    span
    {
        display :block;
        align-content: center;
    }
    input
    {
        margin-left: 35%;
        font-family: Arial, Geneva,Helvetica, sans-serif;
	font-size: 0.8725em;
	color: #575757;
	padding: 8px;
	display: block;
	width: 30%;
	background: #FFFFFF;
	border: 1px solid rgba(184, 184, 184, 0.86);
	outline: none;
	-webkit-appearance: none;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
        
    }
    input[type="submit"]{
	font-family: 'Quattrocento Sans', sans-serif;
	background: #6F6F6F;
	color: #ffffff;
	border: 1px solid #646464;
	cursor: pointer;
	padding: 10px 18px;
	text-transform: uppercase;
	font-size:1em;
	font-weight: 400;
	outline: none;
	position: relative;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	-o-transition: all 0.3s;
	transition: all 0.3s;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
    }
    
    textarea
    {
        margin-left: 35%;
        font-family: Arial, Geneva,Helvetica, sans-serif;
	font-size: 0.8725em;
	color: #575757;
	padding: 8px;
	display: block;
	width: 30%;
	background: #FFFFFF;
	border: 1px solid rgba(184, 184, 184, 0.86);
	outline: none;
	-webkit-appearance: none;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
        
        resize:none;
	height:100px;	
    }
</style>

<div class="main_btm">
    <div class="container">
        
        <div class="section group">	
            
                <h2 class="style" align ="center">HOME FRONT</h2>
                <h3 align="center">
                    <div class="col span_2_of_4">

                        <div >
                            <span><label>Gambar 1</label></span>
                            <span><img src="images/banner1.jpg" data-thumb="images/1.jpg" alt="" style="width: 30%;height:30%;"/></span>
                            <span><input type="file" value="Choose File"/></span>
                        </div>
                        <div>
                            <span><label>Gambar 2</label></span>
                            <span><img src="images/banner2.jpg" data-thumb="images/2.jpg" alt="" style="width: 30%;height:30%;"/>
                            <span><input type="file" value="Choose File"/></span>
                        </div>
                        <div>
                            <span><label>Gambar 3</label></span>
                            <span><img src="images/banner3.jpg" data-thumb="images/3.jpg" alt="" style="width: 30%;height:30%;"/>
                            <span> <input type="file" value="Choose File"/></span>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Update Gambar" ></div>
                        </div>
                    </div>
                </h3>
                <h2 class="style" align ="center">VISI & MISI</h2>
                <div class="col span_2_of_4">
                    <h3 align="center">
                        <div >
                            <span><label>Visi</label></span>
                        </div>
                        <div>
                            <span>
                                <span><textarea name="visi"> </textarea></span>
                            </span>
                        </div>
                        <div >
                            <span><label>Misi</label></span>
                        </div>
                        <div>
                            <span>
                                <span><textarea name="misi"> </textarea></span>
                            </span>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Update Visi Misi" ></div>
                        </div>
                    </h3>
                </div>
        </div>
    </div>
</div>