# Model, view, controller (also: even more acronyms 🤔)

- Repository: `mvc`
- Type of Challenge: `Learning`
- Duration: `2-3 days`
- Team challenge : `solo`

## The mission

MVC is one of the typical acronyms in programming.
It's a structure that will split your project into different files with a clear responsibility for each:

- **Models** are classes that contain data. They usually correspond to a table from your database.
- **Views** are files that will mostly contain HTML. Any user facing end result will be made here.
- **Controllers** are classes responsible to control the handling of a request: they will load the right models and provide them to the correct view.

> Why all this hassle? Can't I just get the data I need in the index?
> The answer is simple: yes, you can<sup>`*`</sup>.

## 🌱 Must-have features

### Step 1: have a look around
First, read the code provided in the [starter pack](./Starter-pack).
It's well documented with comments. Try to follow the track of the homepage.
Can you follow the path to the view?

> Know what you Google for: modal or model? A modal is a popup window, a model is part of the MVC structure. Or your future boy/girlfriend.

### Step 2: preparation
For this exercise, you'll need a database with an articles table.
Add three fields: 
- title (VARCHAR, 255)
- description (TEXT)
- publish_date (DATETIME)

Discover the writer in yourself and provide some dummy content. (childhood stories allowed)

### Step 3: showtime
The homepage from the starter pack works and provides a link to the articles page.
The articles > index view contains a nice overview of the articles, but does not have the data.
Finish all the TODO's in the controller to provide the required info.

## 🌼 Nice to have (doable)

- Provide a detail page to show all content from an article.
- Add previous/next links to an article detail page.
- Can you find any info that would make sense to a function in the article model? There's a hint in the spoiler below.
- An article right now is pretty dry. Make it stand out by adding the related database properties, or upgrading the existing ones. (example: a url to an image)

<details>
    <summary>Hint for the article model</summary>

    The url is a good example of something related to an article that you might need multiple times. Moving this to a function in that model will make possible future changes to it *way* easier. Can you spot in your future code?

</details>

## 🌳 Nice to have (hard)

- Expand the database and models with an author. Each article should have an author. The article title should be shown in the following format `A guide on building your own rocket - By Elon Musk`.
- Make a detail page for an author, listing all his/her articles on that page.

> <sup>`*`</sup> This will not prepare you for frameworks however, which make heavy usage of the MVC pattern<sup>`**`</sup>

> <sup>`**`</sup> Alright, then... is there *always* a catch?
> The answer is simple: yes.

Best of luck!
I hope you'll be able to end with these famous words:

![](https://media.giphy.com/media/l3vR6aasfs0Ae3qdG/giphy.gif)
