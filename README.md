#Magento with Nexmo SMS

<img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image1.png" width=200>

##Introduction

**Magento with Nexmo SMS** app will allow Magento’s shop owner to be updated about orders and their status via SMS. Magento Commerce is the leading provider of open omnichannel innovation.

Over the past years, mobile has become the most impactful communication platform due to its massive adoption rate. And thus, Short Messaging Service (SMS) becomes an effective communication channel to deliver business-critical information in short timeframe to respective team members. SMS empowers shop owner to stay updated with the orders that matter and allow them to proactively respond to customers.

##Use case

1.  Send SMS on new order creation to shop owner and customer.

2.  Send SMS on cancelling an order to shop owner and customer.

3.  Send SMS on Invoice creation to shop owner and customer.

4.  Send SMS if an order is completed to shop owner and customer.

##Prerequisites 

-   Magento environment with admin credentials

-   Nexmo subscription and corresponding Nexmo API keys (Keys and Secret). To access the API keys, see appendix section.

-   Internet connectivity to configure the app.

-   Configure shop with phone numbers in international format in Magento.

##Features 

-   Allows to define threshold value for order amount.

-   Have full control over SMS functionality by enabling and disabling SMS feature on particular event for shop owner and customer.

##Steps to install the Magento with Nexmo SMS app

1.  Visit the target Git repository using the [URL](https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Package/MagentoWithNexmoSMS-1.0.0.tgz).

2.  Click on **Raw** as shown, app's zip file will get downloaded.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image3.png" width=600>

3.  Login into Magento with admin credentials.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image4.png" width=600>

4.  Navigate to **System &gt;&gt; Magento Connect &gt;&gt; Magento Connect Manager** from top menu.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image5.png" width=600>

5.  Login with admin credentials.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image6.png" width=600>

6.  Under the **Direct package file upload** section, click on **Choose File**, select the package and then click on **Upload.**

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image7.png" width=600>

7.  The following screen will appear:

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image8.png" width=600>

8.  Scroll to the top and click on **Return to Admin**.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image9.png" width=600>

9.  Now navigate to **System &gt;&gt; Configuration** from top menu.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image10.png" width=600>

10. From the left side menu, click on **Nexmo Configuration**.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image11.png" width=600>

    If you don’t see above page, it may be because of cache issue, so please try logout and login again.

11. Provide credentials and other details and click on **Save Config**.

12. The **Magento with Nexmo SMS** app is configured. The shop owner will receive an SMS whenever an order is placed/cancelled/invoice generated or order marked as completed.

##Place an Order 

1.  Click on **Add to cart** for any item you want to buy.

2.  For checkout, follow the instructions given and provide details asked for.

3.  Choose payment option.

4.  Finally submit the order.

5.  The shop owner/customer will get an SMS if the amount of the order is more than the threshold informing about the order placed with the order id.

##Cancelling an Order

1.  Login with admin credentials.

2.  Navigate to **Sales &gt;&gt; Orders** and click on **View** link of any order to be cancelled.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image12.png" width=600>

3.  Click on **Cancel** button and confirm it.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image13.png" width=600>

4.  The shop owner/customer will get an SMS if the order amount is more than the threshold amount.

##Generating an Invoice 

1.  Navigate to **Sales &gt;&gt; Orders** and click on **View** link of any order.

2.  When you click on **View** link of any pending status order, you will get **Invoice** button to generate the invoice as shown.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image14.png" width=600>

3.  Click on **Invoice** and click on **Submit Invoice** on the next screen at the bottom.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image15.png" width=600>

4.  The shop owner/customer will get an SMS if the amount invoiced is more than the threshold amount. It changes the status of order from pending to processing.

##Make an order complete

1.  On the same **View** screen, there is a **Ship** button.

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image16.png" width=600>

2.  Click on **Ship** button. On the next screen click on **Submit Shipment.**

    <img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image17.png" width=600>

3.  Submitting the shipment marks an order complete. The shop owner/customer will get an SMS if the amount is more than the threshold amount.

##Appendix

Nexmo API Keys
------------------------------------------------------------------------------------------------------------

-   To access the Nexmo keys, go to <https://www.nexmo.com/> and sign-in.

-   On the top right corner, click on the **Api Settings**.

-   Key and Secret will display in the top bar as shown in the below image:

	<img src="https://github.com/AdvaiyaLabs/Magento-with-Nexmo-SMS/blob/master/Docs/image18.png" width=600>
