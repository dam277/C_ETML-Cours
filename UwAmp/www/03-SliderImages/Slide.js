class Slide
{
    constructor(image, title, subtitle)
    {
        this.image = image;
        this.title = title;
        this.subtitle = subtitle;
    }

    getImage()
    {
        return this.image;
    }

    getTitle()
    {
        return this.title;
    }

    getSubtitle()
    {
        return this.subtitle;
    }
}