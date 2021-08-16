# Create, read, update and delete 🧱

## Objectives
- Consolidate knowledge of OOP, classes and databases
- Create, read, update and delete (crud) a data inventory

## Specifications
💡 A typical `CRUD` implementation allows the user or admin to create, read, update and delete data that will typically be used for any systems relying on dynamic data.
This can involve a lot of steps: validation, styling or retaining data when validation fails. Doing all this can be time-consuming, so focus on the logic building first for this exercise.

### Must-haves
#### Preparation
- Think of a collection for which you'd like to have an inventory.
- What information is interesting to keep track of?
- Prepare a database structure to contain this info and add some quick dummy content
- Have a look at the provided structure (make as much use of it as you can, it will pay off later)

#### Step 1: read
- Build an overview of your collection on the overview page.

#### Step 2: create
- Create a form containing all the relevant fields.
- Save the field information as a new entry in the database once it is submitted.
- In a real application, you'd validate all data. In this case it's optional: focus on the database parts first.

#### Step 3: update
- Create a new file called edit.php.
- Load this edit page when clicking on an edit entry link for any specific item.
- Make sure the database is updated when the edit form is submitted.

#### Step 4: delete
- Build a link to delete.php that will delete a specific product from the database
- Afterwards, it will redirect to the overview

### Nice-to-haves
- Check who might need your help. Maybe your discoveries can already prove valuable to your peers?
- Pair up with someone: how does your approach differ from theirs? Discuss and look for opportunities to further improve your code.
- Add a detail page called show.php (no styling needed) that is accessed once an item is clicked. Which PHP technique can you use to specify the id of that product on the detail page?
- So everything works for the good guys? Nice! What if the bad guys discover your site too...? Read up on SQL injection and protect your code against it.
- What interesting data can you include into your collection: images or fetch some stuff from an API - found something? Go for it!
