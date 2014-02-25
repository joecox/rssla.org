function ProfileNode (radius, type)
{
   this.$elem = undefined;
   this.$parent = $("#profileGraph");

   // Radius: default value of 100
   this.radius = radius || 100;
   this.width = undefined;
   this.height = undefined;
   this.cx = undefined;
   this.cy = undefined;
   this.scalable = undefined;

   this.fill = undefined;
   this.tint = undefined;

   this.$titleElem = undefined;
   this.title = undefined;
   this.$textElem = undefined;
   this.text = undefined;

   this.children = Array();

   this.type = type;

   this.init(type);
}

ProfileNode.prototype.init = 
function (type)
{
   this.cx = this.radius;
   this.cy = this.radius;
   this.width = this.radius * 2;
   this.height = this.radius * 2;

   this.scalable = type == "leaf" ? false : true;

   this.$elem = $("<div>").addClass("profileNode")
                          .css("border-radius", this.radius)
                          .width(this.width)
                          .height(this.height);

   this.buildHandlers();

   if (type == "root")
   {
      this.tint = $("<div>").addClass("nodeTint")
                            .css("border-radius", this.radius)
                            .width(this.width)
                            .height(this.height)
                            .css("background-color", "rgba(66, 150, 255, 0.5)");
      this.$elem.append(this.tint);
   }

   if (type != "root")
   {
      this.setFill("rgb(66, 150, 255)");
   }

   $("#profileGraph").append(this.$elem);
};

ProfileNode.prototype.buildHandlers = 
function ()
{
   var profileNode = this;

   this.$elem.on("mouseover", function()
   {
      profileNode.scale(10, 100);
      if (profileNode.tint)
      {
         profileNode.tint.animate({ opacity: 0 }, { duration: 100, queue: false });
      }
      if (profileNode.type == "root")
      {
         profileNode.$titleElem.animate( { opacity: 0 }, 100);
      }
   });

   this.$elem.on("mouseout", function()
   {
      profileNode.scale(-10, 100);
      if (profileNode.tint)
      {
         profileNode.tint.animate({ opacity: 1 }, { duration: 100, queue: false });
      }
      if (profileNode.type == "root")
      {
         profileNode.$titleElem.animate( { opacity: 1 }, 100);
      }
   });

   this.$elem.on("click", function()
   {
      profileNode.expand();
   });
}

ProfileNode.prototype.move =
function (x, y, time)
{
   this.cx = x;
   this.cy = y;

   this.$elem.css("top", this.cy - this.radius)
             .css("left", this.cx - this.radius);
};

ProfileNode.prototype.center = 
function ()
{
   this.cx = this.$parent.width() / 2;
   this.cy = this.$parent.height() / 2;

   this.$elem.css("top", this.cy - this.radius)
             .css("left", this.cx - this.radius);
};

ProfileNode.prototype.setFill = 
function (color, image)
{
   if (color)
   {
      this.fill = color;
      this.$elem.css("background", this.fill);
   }
   else if (image)
   {
      this.fill = image;
      this.$elem.css("background", "url(" + this.fill + ")")
                .css("background-size", "cover");
   }
   else
   {
      this.fill = "white";
      this.$elem.css("background", this.fill);
   }
};

ProfileNode.prototype.setTitle = 
function (text, full)
{
   this.title = text;
   if (!this.$titleElem)
   {
      this.$titleElem = $("<div>").addClass("nodeTitle")
                                  .text(this.title);

      if (full)
      {
         var fontSize = 4 * (this.width / 300) + "rem";
         var fontWidth = 200 * (this.width / 300);

         var marginLeft = -(fontWidth / 2);
         this.$titleElem.addClass("full")
                        .css("font-size", fontSize)
                        .css("width", fontWidth)
                        .css("margin-left", marginLeft);

         // Append to HTML to calculate height
         var $tempEl = this.$titleElem.clone();

         $tempEl.css("float", "left").hide();
         $("html").append($tempEl);

         var marginTop = -($tempEl.height() / 2);
         $tempEl.remove();

         this.$titleElem.css("margin-top", marginTop);
      }

      this.$elem.append(this.$titleElem);
   }
};

ProfileNode.prototype.scale = 
function (radius, time)
{
   this.radius += radius;
   this.width += radius * 2;
   this.height += radius * 2;

   if (!time)
   {
      this.$elem.css("width", this.width)
                .css("height", this.height)
                .css("top", this.cy - this.radius)
                .css("left", this.cx - this.radius)
                .css("border-radius", this.radius);

      if (this.tint)
      {
         this.tint.css("width", this.width)
                  .css("height", this.height)
                  .css("border-radius", this.radius);
      }
   }
   else
   {
      this.$elem.stop()
                .animate({ "width": this.width,
                           "height": this.height,
                           "top": this.cy - this.radius,
                           "left": this.cx - this.radius,
                           "border-radius": this.radius }, time);


      if (this.tint)
      {
         this.tint.stop()
                  .animate({ "width": this.width,
                             "height": this.height,
                             "border-radius": this.radius }, { duration: time, queue: false });
      }
   }
};

ProfileNode.prototype.scaleTo = 
function (radius, time)
{
   radius = radius - this.radius;
   this.scale(radius, time);
}

ProfileNode.prototype.addChild = 
function (node)
{
   this.children.push(node);
};

ProfileNode.prototype.expand = 
function ()
{
   this.scaleTo(50, 300);

   var step = (2 * Math.PI) / this.children.length;
   var angle = 0;
   var expandRadius = 150;
   for (var ii = 0; ii < this.children.length; ii++)
   {
      var childNode = this.children[ii];

      var top = Math.round(this.cy + (this.radius + expandRadius) * Math.sin(angle));
      var left = Math.round(this.cx + (this.radius + expandRadius) * Math.cos(angle));

      childNode.move(left, top);

      var line = draw.polyline(this.cx + "," + this.cy + " " + this.cx + "," + this.cy)
                     .stroke({ width: 1 });

      line.animate(400).plot(this.cx + "," + this.cy + " " + childNode.cx + "," + childNode.cy);

      angle += step;
   }

   var node = this;

   setTimeout(function()
   {
      for (var ii = 0; ii < node.children.length; ii++)
      {
         node.children[ii].show(300);
      }
   }, 300);

   this.$titleElem.hide();

};

ProfileNode.prototype.show = 
function (time)
{
   if (!time)
   {
      this.$elem.show();
   }
   else
   {
      this.$elem.fadeIn(time);
   }
};