# Online Marketplace :chart_with_upwards_trend:
Academic school project in 420-411-VA ECOMMERCE COURSE

- [Online Marketplace :chart\_with\_upwards\_trend:](#online-marketplace-chart_with_upwards_trend)
- [Project Description :newspaper:](#project-description-newspaper)
- [Project time Estimation :calendar:](#project-time-estimation-calendar)
- [Goal of the project :dart:](#goal-of-the-project-dart)
- [Project Guidelines](#project-guidelines)
    - [Features :memo:](#features-memo)
  - [How to run the app using xampp](#how-to-run-the-app-using-xampp)
    - [Windows](#windows)
  - [Goal of the feature](#goal-of-the-feature)
  - [Icons and Designs](#icons-and-designs)
    - [Icons](#icons)
    - [Designs](#designs)
- [Live Video Model](#live-video-model)
- [Future Implementation](#future-implementation)
  - [Buyer](#buyer)
  - [Vendor](#vendor)
  - [Other future improvements](#other-future-improvements)
- [Project Team :goat:](#project-team-goat)
  - [TEAM NAME](#team-name)
    - [Team member](#team-member)
- [Instructor :dragon:](#instructor-dragon)

# Project Description :newspaper:

A web application that allows registered sellers to list their products for sale. A Registered or non registered user can see the product listing however only the registered user can buy these products. This online web application will be a marketplace, which will act and function like the Amazon website. 


# Project time Estimation :calendar:

We will use online resources and model our solutions on the Amazon web application. The time estimation we have for this project is about 160 hours or 80 hours per team member.

# Goal of the project :dart:

To showcase our  critical thinking analyst and problem solving skills.
To demonstrate our knowledge in web development using proper MVC design pattern and php object oriented programming.

# Project Guidelines
### Features :memo:

**Client/Buyers** :bust_in_silhouette:

1. As a buyer, I can register, login, and logout or sign in as a guest
2. As a buyer, I can add, modify, and delete products from my cart
3. As a buyer, I can favorite products/ add to my wishlist
4. As a buyer, I can see sales and other promotions
5. As a buyer, I can see product details and product review
6. As a buyer, I can modify my profile info/shipping
7. As a buyer, I can search up products (postponed)
8. As a buyer, I can add product to my cart
9. As a buyer, I can checkout my cart (postponed)
10. As a buyer, I can check other user profile (postponed)
11. As a buyer, I can see my purchase history (postponed)
12. As a buyer, I can add money to my virtual wallet using credit info
- - -
**Client/Sellers** :bust_in_silhouette:

1. As a vendor, I can register, login and logout
2. As a vendor, I can add, modify and delete product from my listing
3. As a vendor. I can see all of my products currently listed
4. As a vendor, I can create and modify my seller profile
5. As a vendor, I can view product purchase history, add shipping tracking numbers and mark them as shipped (postponed)
6. As a vendor, I can set my products on sale
7. As a vendor, I can monitor my sales daily, weekly, monthly and annually (postponed)
8. As a vendor, I can check other user profile (postponed)
9. As a vendor, I can advertise my online store from the main marketplace page
10. As a vendor, I can put my products on sale
11. As a vendor, I can add money to my virtual wallet using credit info

## How to run the app using xampp
### Windows
1. Download Xampp and install it from this official Xampp [Link](https://www.apachefriends.org/download.html)
2. Once installed, you can clone or download the repo as a zip file
3. Navigate to htdocs and inside the folder you extract the zip file
4. To clone the repo, open CMD and make sure you are inside the htdocs director
5. Then run this command `git clone [repo link] .`
6. Once done, open Xampp and start the Apache and MySQL
7. Click MySQL admin to open the database dashboard
8. Click import to load the database to the server
9. The marketplace.sql database is located inside the htdocs/data
10. IMPORTANT STEP: You have to enable `extension=intl` in the php.ini file located in the xampp installation directory `C:\xampp\php. Search for intl and remove the `;` character to enable the extension. 
11. In the same browser you can type in the url `localhost`
12. You should then see the Marketplace

## Goal of the feature
- The goal of the features are to simplify the process of Vendors selling their products online and help buyers to
find the product they are looking for. The homepage is where all products can be seen. Any user is able to see all the listed products and so as the advertisement and promotional products
- Virtual wallet is another feature that allow users to manage their money online. The buyer use the virtual wallet to purchase products on the marketplace. For the vendor, all profits will be saved in the virtual wallet.
- The Marketplace has a fully functional localization between English and French.

## Icons and Designs
### Icons
Question Mark Icons
: It represents details. When a user clicks it will open up a modal containing product details
Heart Icons
: It represents favorite and add to wishlist. When a user clicks it for the first time, it will add it to the wishlist and the icon will change to a filled heart. If user clicks it for the second time, it will removed it from the wishlist and the icon change back to an empty heart. This feature is only available to the buyer account
Bag Icons
: It represents add to cart. When a user clicks the selected item it will be added to the buyer cart. The cart quantity will increase and the product quantity will decrease. Once the product quantity reaches 0, a buyer will not be able to add to cart anymore.q
### Designs
Card
: For better scannability, I increase the card size of all the product items. This way it has a better chance of grabbing the attention of the buyer
Adaptable Navigation and Dashboard
: The navigation bar changes depending on the type of the account that is currently log in. Only buyer has the cart feature and the wishlist dashboard.
Bootstraps Modal
: I use modals to modernize the feel of the website
User profile
: I model the user profile similar to other social platform like facebook and twitter. People are already use to this style that is why It is a good idea to style the user profile in the same way

# Live Video Demo 
[![Watch the demo](https://img.youtube.com/vi/Z_EJbFv/maxresdefault.jpg)](https://youtu.be/Z_EJbFv-YGI)


# Future Implementation
## Buyer
1. As a buyer, I can checkout my cart
2. As a buyer, I can leave a comment to a product that I purchased
3. As a buyer, I can rate the product that I purchased
4. As a buyer, I can track my package
5. As a buyer, I can see my order history
6. As a buyer, I can search product by name, category and description
7. As a buyer, I can search other user
8. As a buyer, I can check other user profiles
9. As a buyer, I can leave a rating and a comment to a vendor profile
10. As a buyer, I can follow other users
## Vendor
1.  As a vendor, I can view product purchase history, add tracking numbers and mark them as shipped
2.  As a vendor, I can make product unavailable once the quantity reaches zero
3.  As a vendor, I have a dashboard to monitor my sales daily, weekly, monthly and annually
4.  As a vendor, I can visit other user profiles
## Other future improvements
1. Add pagination to each department(Ads,All Listing,Promotions)
2. Filter feature
3. Discounted price should apply to all instance of that item
4. Cleaner code and use dry methodology
5. Create an marketplace admin account
6. Implement the service transaction between users


# Project Team :goat:
## TEAM NAME
- CodeBros
### Team member
    - Jeffrey Grospe


# Instructor :dragon:
Michel Paquette
