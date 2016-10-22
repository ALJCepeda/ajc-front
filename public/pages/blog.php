<div class='page'>
  <div class='page-content'>
    <div class='well col-xs-8' style='margin-left:15px;'>
    <!--
        <div class='flex-container' data-bind='with: selectedContent'>
            <div class='header'>
                <h1 data-bind='text: title'></h1>
            </div>

            <div class='body' data-bind='text: content'></div>
        </div>
    -->
    <style>
        .blog > .header {
            margin-bottom:10px;
        }
        .blog > .body > p {
            text-indent: 25px;
            margin-bottom:20px;
        }
        .blog * h2 {
            margin-bottom:25px;
        }
        .blog * h4 {
            margin-bottom:20px;
            text-decoration: underline;
        }
        .blog-list {
            margin-top:20px;
        }
        .blog-list > div {
            display:flex;
        	flex-flow:row nowrap;
            align-items:center;
            justify-content:space-between;
            margin-top:5px;
            margin-bottom:5px;
            margin-left:30px;
        }
        .blog-list > div > div:first-child > span {
            list-style:disc outside none;
            display:list-item;
            white-space:nowrap;
        }
        .blog-list > div * div{
            display:flex;
        	flex-flow:row nowrap;
            align-items:center;
            justify-content:center;
        }
        .blog-list > div > div:nth-child(2) {
            padding-left:15px;
            max-width: 85%;
        }
    </style>
        <div class='flex-container blog'>
            <div class='header'>
                <h1>The Primary Objective</h1>
            </div>

            <div class='body'>
                <p>A true Software Engineer wears many hats and should possess a large skillset to take on any problems that come their way. Mattering on who you ask their job can encompass a wide range of responsibilities from dealing with customers/clients to administrative duties to developing a technical stack. Regardless of the job description every engineer and developer share the same responsibility that must be carried out to the full extent of their abilities. It's not a technical obligation it's an ethical one</p>
                <p>What I speak of is to approach one's work in such a way as to minimize the difficulties of future maintainers to adapt to the project. It's fairly common for engineers to work somewhere for a couple of years then migrate to new projects as the next step in their career. Unfortunately it's all too common that the project is sufficiently complex that the engineer is the only person that can work effectively on it</p>
                <p>As businesses become more reliant on software, poorly designed code can be a quick end to people's dreams and jobs. What's more likely to happen is a slow death to unmanageable code where investors continue to pump money into a product that's simply unrecoverable. Rather than cut their ties or start over, they wash through developers in hopes of finding someone that can pick up the slack</p>
                <h2>What can be done?</h2>
                <h4>Self Documenting Code</h4>
                <p>Lets face it, no one enjoys documenting or commenting and while it's a necessary evil for some projects (like APIs) it's not a requirement for most. Self Documenting Code can sometimes refer to special directives in code that, when parsed with a tool like Doxygen, automatically generates stand-alone documents. That's not what I'm talking about.</p>
                <p>What I'm referring to is a naming convention that implicitly describes the code it's a part of. Here's an example of code with bad naming convention:</p>
                <pre><code class='javascript'>
                    var test = function() {

                    };
                </code></pre>
                <p style='text-indent:0px;margin-top:20px;'>Here's the same snippet but with self documentation</p>
                <pre><code class='javascript'>
                    var test = function() {

                    };
                </code></pre>
                <p style='margin-top:20px;'>As you can see the first example requires you to think through the function line by line in order to fully understand what's going on. While it's not typical to use this sort of naming convention there are plenty of developers who use convoluted names when coding</p>
                <p>The second example is much easier to understand and a complete understanding of what the function does can be derived just by reading it's name. If modifications need to be the function it's easy to 'orient' yourself just by reading the variable names</p>
                <h4>Design Patterns</h4>
                <p>There here for a reason, learn them, love them and utilize them. There's many patterns out there but like algorithms and data structures, they're indispensable tools that every engineer needs. Design patterns are abstract solutions to common problems, here are a few worth mentioning:</p>
                <div class='blog-list'>
                    <div>
                        <div>
                            <span>Adapter:</span>
                        </div>
                        <div>
                            Convert an interface into a new one. Useful when you have similar but incompatible classes that can can use a common interface
                        </div>
                    </div>

                    <hr>

                    <div>
                        <div>
                            <span>Pub/Sub:</span>
                        </div>
                        <div>
                            Notify any number of objects with changes/events. This is great when you have to update objects when something happens but you don't have control over the things that need to be notified. Think of EventHandlers in Javascript
                        </div>
                    </div>

                    <hr>

                    <div>
                        <div>
                            <span>Factory:</span>
                        </div>
                        <div>
                            A class dedicated towards constructing similarly related objects. Great for when you have many classes that follow follow a similar construction pattern. Could also be used to construct a single class in many different ways but I would question the complexity of your class if this was actually necessary
                        </div>
                    </div>

                    <hr>

                    <div>
                        <div>
                            <span>Front Controller:</span>
                        </div>
                        <div>
                            Acts as a single point of entry for applications. Reduces overall complexity by have a single place to handle interactions, errors, configurations etc.
                        </div>
                    </div>

                    <hr>

                    <div>
                        <div>
                            <span>Module:</span>
                        </div>
                        <div>
                            Groups classes, functions and other modules together to be used wherever necessary. Helps to organize code in a way that easy to maintain and reason about
                        </div>
                    </div>

                    <hr>

                    <div>
                        <div>
                            <span>Null Object:</span>
                        </div>
                        <div>
                            Avoid null reference errors by providing a default object. When you have defaults you can reduce unnecessary checks and define default behaviors for when a value isn't present. Be careful as this can also mask issues you would otherwise uncover with null reference errors, such as forgetting to set something when you need to
                        </div>
                    </div>

                    <hr>
                </div>
                <h4>Version Control System</h4>
                <p>It doesn't cease to surprise me how many 'tech' companies still don't version control their software. It's a vital tool for any developer that allows us to save and revert between revisions. It makes your life as a developer much easier when you aren't afraid to make mistakes that'll break your software. Not sure what you did wrong? Either diff between commits are complete revert back to a working state. Problem solved.</p>
                <p>Not only does it give me confidence as an engineer it also allows us to keep a record of all the changes made to the software. Any future maintainers can review the history, see the changes that have been made and (most importantly) why they were done. Here's a great article that goes over some best practices with git: https://sethrobertson.github.io/GitBestPractices/ but many of the suggestions can be adopted to any VCS</p>
                <h4>Continuous Refactoring</h4>
                <p>When engineering it's sometimes good to fix what isn't broken. Managers, human resources and (possibly) project manager and CTO probably won't like this unless they also happen to be competent engineers. Be prepared to have a fight on your hands but it's absolutely crucial the codebase undergoes occasional refactoring to protect against software bloat and rot. Trust me, this is a battle you can afford to back down from</p>
                <p>Most places will want to keep pushing out new features and only go back to look at old code to fix bugs as they make themselves known. Typically bugs present a test case that wasn't considered and an opportunity to restructure code based on this new information. Unfortunately many developers will simply use a hack/bandaid to address the issue as quickly as possible with the intent to refactor at some later point</p>
                <p>The problem is later rarely (if ever) happens. Instead bandaids become the norm which adds to the bloated and creates even harder to debug issues down the road. They're called hacks for a reason, intrinsically there are better solutions available and by their nature, they're hard to reason about</p>
                <p>Continuous refactoring gives you the opportunity to restructure the code base as new features are added. It allows you to revisit old problems with new knowledge and optimized solutions that not only make the code easier to understand but will also prevent future bugs from happening. You can consider this a form of pro-active optimization</p>
                <h4>Unit Test</h4>
                <p>I feel like this should speak for itself and yet it's pretty common to hear people say "We're not big enough for tests" or better still "The software is too complex to test effectively". Here's the thing, if your code is hard to test that's an issue with your design not the complexity of the project</p>
                <p>Unit Tests are a great metric to show you good your design is. If you can't easily test your code then there's a very good chance it's highly coupled and need of improvement. Unit Tests also give you confidence you aren't introducing breaking changes as you add features. Every time you make changes to a particular piece of code just rerun your tests to make sure everything still works as intended.
                <h4>Third Party Libraries</h4>
                <p>"Not Invented Here" is a problem I see often and while there's sometimes legitimate reasons for "reinventing the wheel" most of the time it's the result of poor judgement. Every piece of code you don't have to write saves you time and money. Every time you use a well maintained library that's less tests you have to write, less security implications you need to be aware of, and one less things you have to refactor and optimize.</p>
                <p>FOSS is filled with very talented maintainers that have probably already solved the problems you're looking at. When browsing open-source libraries for a solution take note of the last time changes were made, the number of open issues and pull requests. There are plenty of active repositories on the web for every platform you can think of. If a library does most of what you want but it's missing a few important features consider joining the community and enacting the features yourself. It'll still be less code you need to write and you get the gratitude of everybody that uses the library (including the maintainers)</p>
            </div>
        </div>
    </div>
    <div class='well col-xs-3 menu-small' style='margin-right:15px; max-height:80vh; overflow-y:auto; padding-left:0px; padding-right:0px'>
        <div style='text-align:center; width:100%'>Blogs</div>

        <ul data-bind='foreach: entries'>
            <li class='active' data-bind='text: $data.title, click:$root.clickedEntry, attr: { id:"entry_" + $data.url, href:$data.url }' style='padding-left:0px; text-align:left'></li>
        </ul>
    </div>
</div>
