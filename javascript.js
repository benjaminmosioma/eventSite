// Example 26-14: javascript.js

canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold italic 97px Georgia'
context.textBaseline = 'top'
image                = new Image()
image.src            = 'robin.gif'

image.onload = function()
{
  gradient = context.createLinearGradient(0, 0, 0, 89)
  gradient.addColorStop(0.00, '#00ff6b')
  gradient.addColorStop(0.66, '#00ff6b')
  context.fillStyle = gradient
  context.fillText(  "E  ent Expo", 0, 0)
  context.strokeText("E  ent Expo", 0, 0)
  context.drawImage(image, 64, 32)
}

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }
