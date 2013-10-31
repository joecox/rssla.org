function CartObject ()
{
	this.id = undefined;
	this.name = undefined;
	this.img_id = undefined;

	this.quantity = 0;

	this.item_price = undefined;
	this.item_price_str = undefined;
	
	/* this.price = quantity * item_price */
	this.price = undefined;

	/* this.price_str is the string of price with 2 digits after decimal */
	this.price_str = undefined;
	this.merch_size = undefined;
	this.merch_size_full = undefined;
}