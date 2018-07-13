var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
        var matches, substrRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function(i, str) {
            if (substrRegex.test(str)) {
                // the typeahead jQuery plugin expects suggestions to a
                // JavaScript object, refer to typeahead docs for more info
                matches.push({ value: str });
            }
        });

        cb(matches);
    };
};

var subcategories = ['Accounting', 'Administrative Services', 'American', 'Aroma Therapy', 'Art', 'Alternative Health', 'Authors', 'Automotive', 'Automotive Parts', 'Automotive Repair', 'Bakery', 'Bar', 'Barbeque', 'Barber Shop', 'Bartending', 'Bed and Breakfast', 'Bistro', 'Blogs', 'Book Store', 'Brunch', 'Cafe', 'Cajun', 'Candles', 'Car Dealerships', 'Car Wash', 'Carpet', 'Caribbean', 'Catering', 'Chicken Wings', 'Childcare', 'Children', 'Church', 'Cigar Lounge', 'Cigars', 'Cleaning Services', 'Clothing', 'Comedy Clubs', 'Computer', 'Construction', 'Cosmetics', 'Consulting', 'Custom Crafts', 'Deli', 'Dentists', 'Dessert', 'Digital Magazines', 'Dollar Store', 'Dry Cleaners', 'Education', 'Ethiopian', 'Event', 'Event Planning', 'Fast Food', 'Film', 'Finance', 'Fitness', 'Food', 'Food Service Management', 'Food Truck', 'Fraternity', 'Gift Wrapping', 'Graphic Design', 'Grass Roots', 'Green', 'Hair Products', 'Haitian', 'Home', 'Home Goods', 'Hotel', 'Ice Cream', 'Interior Designer', 'Insurance', 'International', 'Italian', 'Jazz Club', 'Jewelry', 'Landscape', 'Latin', 'Legal', 'Liquor', 'Lounge', 'Marketing', 'Media', 'Museum', 'Music', 'Music Venue', 'Nail Salon', 'New American', 'Night Club', 'Non Profit Organizations', 'Notary', 'Office Space', 'Optometrists', 'Pest Control', 'Pizza', 'Photo Booth', 'Photography', 'Plumbing', 'Podcasts', 'Primary Care Physicians', 'Printing', 'Professional Organization', 'Public Relations', 'Real Estate', 'Recording Artists', 'Salon', 'Seafood', 'Skin Care', 'Snow Plow', 'Soul Food', 'Sorority', 'Sound and Lighting', 'Spa', 'Sports Bar', 'Tattoo', 'Taxi', 'Therapist', 'Transportation', 'Travel', 'Travel Agent', 'Tree Service', 'Vegan', 'Vegetarian', 'Video Games', 'Virtual Office Space', 'Video', 'Web Design', 'Websites', 'Wine Bar', 'Yogurt'];

$('.typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 3
}, {
    name: 'subcategories',
    displayKey: 'value',
    source: substringMatcher(subcategories)
});
